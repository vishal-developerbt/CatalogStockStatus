<?php
namespace Bluethinkinc\CatalogStockStatus\Model\Rule\Condition;

use Magento\Rule\Model\Condition\Combine as RuleCombine;
use Magento\Rule\Model\Condition\Context;

class Combine extends RuleCombine
{
    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->setType(self::class);
    }

    public function getNewChildSelectOptions()
    {
        $conditions = parent::getNewChildSelectOptions();
        $conditions = array_merge_recursive(
            $conditions,
            [
                [
                    'value' => [
                        [
                            'value' => \Bluethinkinc\CatalogStockStatus\Model\Rule\Condition\Product::class,
                            'label' => __('Product Attribute'),
                        ],
                    ],
                    'label' => __('Product Attributes'),
                ],
            ]
        );
        return $conditions;
    }
}
