<?php

namespace Kruzhalin\TestTask\Model;

/**
 * Class Log
 * @package Kruzhalin\TestTask\Model
 */
class Log extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'kruzhalin_test_log';

    protected $_cacheTag = 'kruzhalin_test_log';

    protected $_eventPrefix = 'kruzhalin_test_log';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Kruzhalin\TestTask\Model\ResourceModel\Log');
    }

    /**
     * @return array|string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
