<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api\Data;

interface NotificationInterface
{

    const PRODUCT_NAME = 'product_name';
    const SUBSCRIBED_AT = 'subscribed_at';
    const PRODUCT_SKU = 'product_sku';
    const STORE_VIEW = 'store_view';
    const EMAIL = 'email';
    const NOTIFICATION_ID = 'notification_id';
    const NOTIFIED_AT = 'notified_at';
    const CUSTOMER_NAME = 'customer_name';

    /**
     * Get notification_id
     * @return string|null
     */
    public function getNotificationId();

    /**
     * Set notification_id
     * @param string $notificationId
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
     */
    public function setNotificationId($notificationId);

    /**
     * Get product_name
     * @return string|null
     */
    public function getProductName();

    /**
     * Set product_name
     * @param string $productName
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
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
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
     */
    public function setProductSku($productSku);

    /**
     * Get customer_name
     * @return string|null
     */
    public function getCustomerName();

    /**
     * Set customer_name
     * @param string $customerName
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
     */
    public function setCustomerName($customerName);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
     */
    public function setEmail($email);

    /**
     * Get subscribed_at
     * @return string|null
     */
    public function getSubscribedAt();

    /**
     * Set subscribed_at
     * @param string $subscribedAt
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
     */
    public function setSubscribedAt($subscribedAt);

    /**
     * Get notified_at
     * @return string|null
     */
    public function getNotifiedAt();

    /**
     * Set notified_at
     * @param string $notifiedAt
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
     */
    public function setNotifiedAt($notifiedAt);

    /**
     * Get store_view
     * @return string|null
     */
    public function getStoreView();

    /**
     * Set store_view
     * @param string $storeView
     * @return \Bluethinkinc\CatalogStockStatus\Notification\Api\Data\NotificationInterface
     */
    public function setStoreView($storeView);
}

