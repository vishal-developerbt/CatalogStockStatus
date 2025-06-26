<?php
namespace Bluethinkinc\CatalogStockStatus\Block\Adminhtml\Promo;

use Magento\CatalogRule\Block\Adminhtml\Promo\Catalog\Edit\Tab\Conditions as BaseConditions;

class CustomConditions extends BaseConditions
{
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('bluethinkinc_catalogstockstatus_rule');

        if (!$model) {
            throw new \Magento\Framework\Exception\LocalizedException(__('Rule model not found.'));
        }

        if (!$model->getConditions()) {
            $model->setConditions($model->getConditionsInstance());
        }

        $form = $this->addTabToForm($model);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
