<?php

namespace Kruzhalin\TestTask\Model\ResourceModel\Log;
/**
 * Class Collection
 * @package Kruzhalin\TestTask\Model\ResourceModel\Log
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'kruzhalin_test_log_collection';
    protected $_eventObject = 'test_log_collection';


    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Kruzhalin\TestTask\Model\Log', 'ruzhalin\TestTask\Model\ResourceModel\Log');
    }
}
