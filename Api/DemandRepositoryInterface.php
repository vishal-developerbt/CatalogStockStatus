<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface DemandRepositoryInterface
{

    /**
     * Save Demand
     * @param \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface $demand
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface $demand
    );

    /**
     * Retrieve Demand
     * @param string $demandId
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($demandId);

    /**
     * Retrieve Demand matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bluethinkinc\CatalogStockStatus\Api\Data\DemandSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Demand
     * @param \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface $demand
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface $demand
    );

    /**
     * Delete Demand by ID
     * @param string $demandId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($demandId);
}

