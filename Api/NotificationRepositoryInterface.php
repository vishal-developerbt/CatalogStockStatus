<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NotificationRepositoryInterface
{

    /**
     * Save Notification
     * @param \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface $notification
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface $notification
    );

    /**
     * Retrieve Notification
     * @param string $notificationId
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($notificationId);

    /**
     * Retrieve Notification matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Notification
     * @param \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface $notification
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Bluethinkinc\CatalogStockStatus\Api\Data\NotificationInterface $notification
    );

    /**
     * Delete Notification by ID
     * @param string $notificationId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($notificationId);
}

