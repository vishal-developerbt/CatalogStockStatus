<?php
namespace Bluethinkinc\CatalogStockStatus\Model\Rule\Condition;

use Magento\Rule\Model\Condition\AbstractCondition;
use Magento\Rule\Model\Condition\Context;

class Product extends AbstractCondition
{
    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->setType(self::class);
    }

    public function loadAttributeOptions()
    {
        $attributes = [
            'sku' => __('SKU'),
            'price' => __('Price'),
            'quantity' => __('Quantity'),
        ];
        $this->setAttributeOption($attributes);
        return $this;
    }

    public function getInputType()
    {
        return 'string';
    }

    public function getValueElementType()
    {
        return 'text';
    }

    public function validate(\Magento\Framework\Model\AbstractModel $model)
    {
        $attribute = $this->getAttribute();
        return $model->getData($attribute) == $this->getValue();
    }
}
