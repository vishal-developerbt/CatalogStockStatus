<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api\Data;

interface NotificationSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Notification list.
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface[]
     */
    public function getItems();

    /**
     * Set product_name list.
     * @param \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

