<?php

namespace Bluethinkinc\CatalogStockStatus\Controller\Adminhtml\Rule;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Bluethinkinc\CatalogStockStatus\Model\RuleFactory;
use Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Rule as RuleResource;

class Save extends Action
{
    protected $dataPersistor;
    protected $ruleFactory;
    protected $ruleResource;
    protected $filesystem;

    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        RuleFactory $ruleFactory,
        RuleResource $ruleResource,
        Filesystem $filesystem
    ) {
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
        $this->ruleFactory = $ruleFactory;
        $this->ruleResource = $ruleResource;
        $this->filesystem = $filesystem;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            return $resultRedirect->setPath('*/*/');
        }

        $id = $this->getRequest()->getParam('rule_id');
        $model = $id ? $this->ruleFactory->create()->load($id) : $this->ruleFactory->create();

        try {
            $ruleData = $data['data'] ?? [];
            $model->setData('rule_name', $ruleData['rule_name'] ?? '');
            $model->setData('priority', $ruleData['priority'] ?? '');
            $model->setData('status', $ruleData['status'] ?? 0);
            $model->setData('store_view', isset($ruleData['store_view']) ? implode(',', $ruleData['store_view']) : '');

            if (isset($data['rule']['conditions'])) {
                $model->setData('conditions_serialized', json_encode($data['rule']['conditions']));
            }

            if (isset($data['dynamic_rows_container']) && is_array($data['dynamic_rows_container'])) {
                $rows = [];
                foreach ($data['dynamic_rows_container'] as $row) {
                    $image = isset($row['image'][0]['file']) ? $this->moveFileFromTmp($row['image'][0]['file']) : '';
                    $icon = isset($row['icon'][0]['file']) ? $this->moveFileFromTmp($row['icon'][0]['file']) : '';

                    $rows[] = [
                        'row_id' => $row['row_id'] ?? '',
                        'condition_type' => $row['condition_type'] ?? '',
                        'range_value' => $row['range_value'] ?? '',
                        'custom_stock_status_text' => $row['custom_stock_status_text'] ?? '',
                        'image' => $image,
                        'icon' => $icon,
                        'record_id' => $row['record_id'] ?? '',
                    ];
                }
                $model->setData('custom_stock_status_text', json_encode($rows));
            }

            $this->ruleResource->save($model);

            $this->messageManager->addSuccessMessage(__('You saved the Rule.'));
            $this->dataPersistor->clear('bluethinkinc_catalogstockstatus_rule');

            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['rule_id' => $model->getId()]);
            }
            return $resultRedirect->setPath('*/*/');

        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Rule.'));
        }

        $this->dataPersistor->set('bluethinkinc_catalogstockstatus_rule', $data);
        return $resultRedirect->setPath('*/*/edit', ['rule_id' => $id]);
    }

    protected function moveFileFromTmp($file)
    {
        if (!$file) {
            return '';
        }

        $file = ltrim(str_replace('bt_catalogstockstatus/tmp/image/', '', $file), '/');

        $mediaDirectory = $this->filesystem->getDirectoryWrite(DirectoryList::MEDIA);

        $tmpPath = 'bt_catalogstockstatus/tmp/image/' . $file;
        $finalPath = 'bt_catalogstockstatus/image/' . $file;

        if ($mediaDirectory->isFile($tmpPath)) {
            try {
                $mediaDirectory->copyFile($tmpPath, $finalPath);
                $mediaDirectory->delete($tmpPath);
            } catch (\Exception $e) {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('File move error: %1', $e->getMessage())
                );
            }
        }

        return 'bt_catalogstockstatus/image/' . $file;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Bluethinkinc_CatalogStockStatus::config');
    }
}
