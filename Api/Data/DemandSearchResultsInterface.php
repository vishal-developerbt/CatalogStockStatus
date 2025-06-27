<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api\Data;

interface DemandSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Demand list.
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface[]
     */
    public function getItems();

    /**
     * Set product_name list.
     * @param \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

