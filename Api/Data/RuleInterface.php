<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CatalogStockStatus\Api\Data;

interface RuleInterface
{

    const UPDATED_AT = 'updated_at';
    const CONDITIONS_SERIALIZED = 'conditions_serialized';
    const IMAGE = 'image';
    const CUSTOM_STOCK_STATUS_TEXT = 'custom_stock_status_text';
    const RULE_NAME = 'rule_name';
    const ICON = 'icon';
    const CREATED_AT = 'created_at';
    const STATUS = 'status';
    const STORE_VIEW = 'store_view';
    const RULE_ID = 'rule_id';
    const PRIORITY = 'priority';

    /**
     * Get rule_id
     * @return string|null
     */
    public function getRuleId();

    /**
     * Set rule_id
     * @param string $ruleId
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setRuleId($ruleId);

    /**
     * Get rule_name
     * @return string|null
     */
    public function getRuleName();

    /**
     * Set rule_name
     * @param string $ruleName
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setRuleName($ruleName);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setStatus($status);

    /**
     * Get priority
     * @return string|null
     */
    public function getPriority();

    /**
     * Set priority
     * @param string $priority
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setPriority($priority);

    /**
     * Get store_view
     * @return string|null
     */
    public function getStoreView();

    /**
     * Set store_view
     * @param string $storeView
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setStoreView($storeView);

    /**
     * Get conditions_serialized
     * @return string|null
     */
    public function getConditionsSerialized();

    /**
     * Set conditions_serialized
     * @param string $conditionsSerialized
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setConditionsSerialized($conditionsSerialized);

    /**
     * Get custom_stock_status_text
     * @return string|null
     */
    public function getCustomStockStatusText();

    /**
     * Set custom_stock_status_text
     * @param string $customStockStatusText
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setCustomStockStatusText($customStockStatusText);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setImage($image);

    /**
     * Get icon
     * @return string|null
     */
    public function getIcon();

    /**
     * Set icon
     * @param string $icon
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setIcon($icon);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
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
     * @return \Bluethinkinc\CatalogStockStatus\Rule\Api\Data\RuleInterface
     */
    public function setUpdatedAt($updatedAt);
}

