<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api\Data;

interface RuleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Rule list.
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\RuleInterface[]
     */
    public function getItems();

    /**
     * Set rule_name list.
     * @param \Bluethinkinc\CatalogStockStatus\Api\Data\RuleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

