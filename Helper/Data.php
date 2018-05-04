<?php

namespace Kruzhalin\TestTask\Helper;

use Magento\Store\Model\ScopeInterface;

/**
 * Class Data
 * @package Kruzhalin\TestTask\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    const TESTTASK_MULTIPLE_ENABLE_XML_PATH = 'kruzhalin_test_task/general/enable';
    const TESTTASK_MULTIPLE_FACTOR_XML_PATH = 'kruzhalin_test_task/general/decimal_factor';
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfigInterface;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context      $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->storeManager         = $storeManager;
        $this->scopeConfigInterface = $context->getScopeConfig();
        parent::__construct($context);
    }

    /**
     * @param null $scopeCode
     * @return mixed
     */
    public function getEnabled($scopeCode = null)
    {
        return $this->scopeConfigInterface->getValue(
            self::TESTTASK_MULTIPLE_ENABLE_XML_PATH,
            ScopeInterface::SCOPE_STORE,
            $scopeCode
        );
    }

    /**
     * @param null $scopeCode
     * @return mixed
     */
    public function getFactor($scopeCode = null)
    {
        return $this->scopeConfigInterface->getValue(
            self::TESTTASK_MULTIPLE_FACTOR_XML_PATH,
            ScopeInterface::SCOPE_STORE,
            $scopeCode
        );
    }
}
