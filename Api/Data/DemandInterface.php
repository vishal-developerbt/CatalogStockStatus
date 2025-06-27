<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api\Data;

interface DemandInterface
{

    const UPDATED_AT = 'updated_at';
    const OUT_OF_STOCK_DATE = 'out_of_stock_date';
    const DEMAND_ID = 'demand_id';
    const PRODUCT_NAME = 'product_name';
    const CREATED_AT = 'created_at';
    const STATUS = 'status';
    const PRODUCT_SKU = 'product_sku';
    const NUMBER_OF_SUBSCRIPTIONS = 'number_of_subscriptions';

    /**
     * Get demand_id
     * @return string|null
     */
    public function getDemandId();

    /**
     * Set demand_id
     * @param string $demandId
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setDemandId($demandId);

    /**
     * Get product_name
     * @return string|null
     */
    public function getProductName();

    /**
     * Set product_name
     * @param string $productName
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setProductName($productName);

    /**
     * Get product_sku
     * @return string|null
     */
    public function getProductSku();

    /**
     * Set product_sku
     * @param string $productSku
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setProductSku($productSku);

    /**
     * Get out_of_stock_date
     * @return string|null
     */
    public function getOutOfStockDate();

    /**
     * Set out_of_stock_date
     * @param string $outOfStockDate
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setOutOfStockDate($outOfStockDate);

    /**
     * Get number_of_subscriptions
     * @return string|null
     */
    public function getNumberOfSubscriptions();

    /**
     * Set number_of_subscriptions
     * @param string $numberOfSubscriptions
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setNumberOfSubscriptions($numberOfSubscriptions);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setStatus($status);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Bluethinkinc\CatalogStockStatus\Demand\Api\Data\DemandInterface
     */
    public function setUpdatedAt($updatedAt);
}

