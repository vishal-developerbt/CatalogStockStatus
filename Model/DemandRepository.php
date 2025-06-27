<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Model;

use Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterface;
use Bluethinkinc\CatalogStockStatus\Api\Data\DemandInterfaceFactory;
use Bluethinkinc\CatalogStockStatus\Api\Data\DemandSearchResultsInterfaceFactory;
use Bluethinkinc\CatalogStockStatus\Api\DemandRepositoryInterface;
use Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Demand as ResourceDemand;
use Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Demand\CollectionFactory as DemandCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class DemandRepository implements DemandRepositoryInterface
{

    /**
     * @var DemandInterfaceFactory
     */
    protected $demandFactory;

    /**
     * @var DemandCollectionFactory
     */
    protected $demandCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceDemand
     */
    protected $resource;

    /**
     * @var Demand
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceDemand $resource
     * @param DemandInterfaceFactory $demandFactory
     * @param DemandCollectionFactory $demandCollectionFactory
     * @param DemandSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceDemand $resource,
        DemandInterfaceFactory $demandFactory,
        DemandCollectionFactory $demandCollectionFactory,
        DemandSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->demandFactory = $demandFactory;
        $this->demandCollectionFactory = $demandCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(DemandInterface $demand)
    {
        try {
            $this->resource->save($demand);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the demand: %1',
                $exception->getMessage()
            ));
        }
        return $demand;
    }

    /**
     * @inheritDoc
     */
    public function get($demandId)
    {
        $demand = $this->demandFactory->create();
        $this->resource->load($demand, $demandId);
        if (!$demand->getId()) {
            throw new NoSuchEntityException(__('Demand with id "%1" does not exist.', $demandId));
        }
        return $demand;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->demandCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(DemandInterface $demand)
    {
        try {
            $demandModel = $this->demandFactory->create();
            $this->resource->load($demandModel, $demand->getDemandId());
            $this->resource->delete($demandModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Demand: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($demandId)
    {
        return $this->delete($this->get($demandId));
    }
}

