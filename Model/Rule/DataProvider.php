<?php

namespace Bluethinkinc\CatalogStockStatus\Model\Rule;

use Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Rule\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    protected $loadedData;
    protected $dataPersistor;
    protected $storeManager;

    /**
     * Constructor
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Load data for form
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        foreach ($items as $model) {
            $data = $model->getData();

            // Process dynamic rows
            if (isset($data['custom_stock_status_text'])) {
                $rows = json_decode($data['custom_stock_status_text'], true);
                if (is_array($rows)) {
                    foreach ($rows as &$row) {
                        $row['image'] = $this->prepareFile($row['image']);
                        $row['icon'] = $this->prepareFile($row['icon']);
                    }
                    $data['dynamic_rows_container'] = $rows;
                }
            }

            // Process store view
            if (isset($data['store_view'])) {
                $data['data']['store_view'] = explode(',', $data['store_view']);
            }

            // Process conditions
           if (isset($data['conditions_serialized'])) {
                $conditions = json_decode($data['conditions_serialized'], true);
                if (is_array($conditions)) {
                    $data['rule']['conditions'] = $conditions;
                }
            }

            // Main form data
            $data['data']['rule_name'] = $data['rule_name'] ?? '';
            $data['data']['priority'] = $data['priority'] ?? '';
            $data['data']['status'] = $data['status'] ?? '';

            $this->loadedData[$model->getId()] = $data;
        }

        // Data from data persistor
        $data = $this->dataPersistor->get('bluethinkinc_catalogstockstatus_rule');
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('bluethinkinc_catalogstockstatus_rule');
        }

        return $this->loadedData;
    }

    /**
     * Prepare file data for image/icon fields
     */
    protected function prepareFile($fileName)
    {
        if (!$fileName) {
            return null;
        }

        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $filePath = 'bt_catalogstockstatus/image/' . $fileName;

        return [[
            'name' => $fileName,
            'url' => $mediaUrl . $filePath
        ]];
    }
}
