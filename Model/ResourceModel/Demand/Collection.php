<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Demand;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'demand_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Bluethinkinc\CatalogStockStatus\Model\Demand::class,
            \Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Demand::class
        );
    }
}

