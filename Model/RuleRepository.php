<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Model;

use Bluethinkinc\CatalogStockStatus\Api\Data\RuleInterface;
use Bluethinkinc\CatalogStockStatus\Api\Data\RuleInterfaceFactory;
use Bluethinkinc\CatalogStockStatus\Api\Data\RuleSearchResultsInterfaceFactory;
use Bluethinkinc\CatalogStockStatus\Api\RuleRepositoryInterface;
use Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Rule as ResourceRule;
use Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Rule\CollectionFactory as RuleCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class RuleRepository implements RuleRepositoryInterface
{

    /**
     * @var RuleCollectionFactory
     */
    protected $ruleCollectionFactory;

    /**
     * @var RuleInterfaceFactory
     */
    protected $ruleFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Rule
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceRule
     */
    protected $resource;


    /**
     * @param ResourceRule $resource
     * @param RuleInterfaceFactory $ruleFactory
     * @param RuleCollectionFactory $ruleCollectionFactory
     * @param RuleSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceRule $resource,
        RuleInterfaceFactory $ruleFactory,
        RuleCollectionFactory $ruleCollectionFactory,
        RuleSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->ruleFactory = $ruleFactory;
        $this->ruleCollectionFactory = $ruleCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(RuleInterface $rule)
    {
        try {
            $this->resource->save($rule);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the rule: %1',
                $exception->getMessage()
            ));
        }
        return $rule;
    }

    /**
     * @inheritDoc
     */
    public function get($ruleId)
    {
        $rule = $this->ruleFactory->create();
        $this->resource->load($rule, $ruleId);
        if (!$rule->getId()) {
            throw new NoSuchEntityException(__('Rule with id "%1" does not exist.', $ruleId));
        }
        return $rule;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->ruleCollectionFactory->create();
        
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
    public function delete(RuleInterface $rule)
    {
        try {
            $ruleModel = $this->ruleFactory->create();
            $this->resource->load($ruleModel, $rule->getRuleId());
            $this->resource->delete($ruleModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Rule: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($ruleId)
    {
        return $this->delete($this->get($ruleId));
    }
}

