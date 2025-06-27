<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Model;

use Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface;
use Magento\Framework\Model\AbstractModel;

class Demand extends AbstractModel implements DemandInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Demand::class);
    }

    /**
     * @inheritDoc
     */
    public function getDemandId()
    {
        return $this->getData(self::DEMAND_ID);
    }

    /**
     * @inheritDoc
     */
    public function setDemandId($demandId)
    {
        return $this->setData(self::DEMAND_ID, $demandId);
    }

    /**
     * @inheritDoc
     */
    public function getProductName()
    {
        return $this->getData(self::PRODUCT_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setProductName($productName)
    {
        return $this->setData(self::PRODUCT_NAME, $productName);
    }

    /**
     * @inheritDoc
     */
    public function getProductSku()
    {
        return $this->getData(self::PRODUCT_SKU);
    }

    /**
     * @inheritDoc
     */
    public function setProductSku($productSku)
    {
        return $this->setData(self::PRODUCT_SKU, $productSku);
    }

    /**
     * @inheritDoc
     */
    public function getOutOfStockDate()
    {
        return $this->getData(self::OUT_OF_STOCK_DATE);
    }

    /**
     * @inheritDoc
     */
    public function setOutOfStockDate($outOfStockDate)
    {
        return $this->setData(self::OUT_OF_STOCK_DATE, $outOfStockDate);
    }

    /**
     * @inheritDoc
     */
    public function getNumberOfSubscriptions()
    {
        return $this->getData(self::NUMBER_OF_SUBSCRIPTIONS);
    }

    /**
     * @inheritDoc
     */
    public function setNumberOfSubscriptions($numberOfSubscriptions)
    {
        return $this->setData(self::NUMBER_OF_SUBSCRIPTIONS, $numberOfSubscriptions);
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}

