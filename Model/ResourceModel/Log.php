<?php

namespace Kruzhalin\TestTask\Model\ResourceModel;

/**
 * Class Log
 * @package Kruzhalin\TestTask\Model\ResourceModel
 */
class Log extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('kruzhalin_test_log', 'id');
    }

}
