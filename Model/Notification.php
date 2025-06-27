<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Model;

use Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface;
use Magento\Framework\Model\AbstractModel;

class Notification extends AbstractModel implements NotificationInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Notification::class);
    }

    /**
     * @inheritDoc
     */
    public function getNotificationId()
    {
        return $this->getData(self::NOTIFICATION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setNotificationId($notificationId)
    {
        return $this->setData(self::NOTIFICATION_ID, $notificationId);
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
    public function getCustomerName()
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerName($customerName)
    {
        return $this->setData(self::CUSTOMER_NAME, $customerName);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @inheritDoc
     */
    public function getSubscribedAt()
    {
        return $this->getData(self::SUBSCRIBED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setSubscribedAt($subscribedAt)
    {
        return $this->setData(self::SUBSCRIBED_AT, $subscribedAt);
    }

    /**
     * @inheritDoc
     */
    public function getNotifiedAt()
    {
        return $this->getData(self::NOTIFIED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setNotifiedAt($notifiedAt)
    {
        return $this->setData(self::NOTIFIED_AT, $notifiedAt);
    }

    /**
     * @inheritDoc
     */
    public function getStoreView()
    {
        return $this->getData(self::STORE_VIEW);
    }

    /**
     * @inheritDoc
     */
    public function setStoreView($storeView)
    {
        return $this->setData(self::STORE_VIEW, $storeView);
    }
}

