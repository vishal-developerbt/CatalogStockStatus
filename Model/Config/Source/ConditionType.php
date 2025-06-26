<?php

namespace Bluethinkinc\CatalogStockStatus\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class ConditionType implements ArrayInterface
{
    /**
     * Return options array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'lt', 'label' => __('Less Than')],
            ['value' => 'gt', 'label' => __('Greater Than')],
            ['value' => 'lteq', 'label' => __('Equals or Less Than')],
            ['value' => 'gteq', 'label' => __('Equals or Greater Than')],
            ['value' => 'range', 'label' => __('Range')],
        ];
    }
}
