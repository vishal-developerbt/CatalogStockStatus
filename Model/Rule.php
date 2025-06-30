<?php

namespace Bluethinkinc\CatalogStockStatus\Model;

use Bluethinkinc\CatalogStockStatus\Api\Data\RuleInterface;
use Magento\Framework\Api\AttributeValueFactory;
use Magento\Framework\Api\ExtensionAttributesFactory;
use Magento\Rule\Model\AbstractModel;

class Rule extends AbstractModel implements RuleInterface
{
    const CACHE_TAG = 'bluethinkinc_catalogstockstatus_rule';

    protected $_cacheTag = self::CACHE_TAG;
    protected $_eventPrefix = 'bluethinkinc_catalogstockstatus_rule';

    /**
     * @var \Magento\CatalogRule\Model\Rule\Condition\CombineFactory
     */
    protected $combineFactory;

    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    protected $serializer;

    /**
     * Constructor
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
        \Magento\CatalogRule\Model\Rule\Condition\CombineFactory $combineFactory,
        \Magento\Framework\Serialize\Serializer\Json $serializer,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        ExtensionAttributesFactory $extensionFactory = null,
        AttributeValueFactory $customAttributeFactory = null,
        array $data = []
    ) {
        $this->combineFactory = $combineFactory;
        $this->serializer = $serializer;

        parent::__construct(
            $context,
            $registry,
            $formFactory,
            $localeDate,
            $resource,
            $resourceCollection,
            $data,
            $extensionFactory,
            $customAttributeFactory
        );
    }

    /**
     * Initialize ResourceModel
     */
    protected function _construct()
    {
        $this->_init(\Bluethinkinc\CatalogStockStatus\Model\ResourceModel\Rule::class);
        $this->setIdFieldName('rule_id');
    }

    /**
     * Get conditions instance
     */
    public function getConditionsInstance()
    {
        return $this->combineFactory->create();
    }

    /**
     * Get actions instance (optional, same as conditions if no action split needed)
     */
    public function getActionsInstance()
    {
        return $this->combineFactory->create();
    }

    // === Getters and Setters ===

    public function getRuleId()
    {
        return $this->getData(self::RULE_ID);
    }

    public function setRuleId($ruleId)
    {
        return $this->setData(self::RULE_ID, $ruleId);
    }

    public function getRuleName()
    {
        return $this->getData(self::RULE_NAME);
    }

    public function setRuleName($ruleName)
    {
        return $this->setData(self::RULE_NAME, $ruleName);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getPriority()
    {
        return $this->getData(self::PRIORITY);
    }

    public function setPriority($priority)
    {
        return $this->setData(self::PRIORITY, $priority);
    }

    public function getStoreView()
    {
        return $this->getData(self::STORE_VIEW);
    }

    public function setStoreView($storeView)
    {
        return $this->setData(self::STORE_VIEW, $storeView);
    }

    public function getConditionsSerialized()
    {
        return $this->getData(self::CONDITIONS_SERIALIZED);
    }

    public function setConditionsSerialized($conditionsSerialized)
    {
        return $this->setData(self::CONDITIONS_SERIALIZED, $conditionsSerialized);
    }

    public function getCustomStockStatusText()
    {
        return $this->getData(self::CUSTOM_STOCK_STATUS_TEXT);
    }

    public function setCustomStockStatusText($customStockStatusText)
    {
        return $this->setData(self::CUSTOM_STOCK_STATUS_TEXT, $customStockStatusText);
    }

    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    public function getIcon()
    {
        return $this->getData(self::ICON);
    }

    public function setIcon($icon)
    {
        return $this->setData(self::ICON, $icon);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
