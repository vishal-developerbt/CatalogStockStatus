<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Demand extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('bluethinkinc_catalogstockstatus_demand', 'demand_id');
    }
}

