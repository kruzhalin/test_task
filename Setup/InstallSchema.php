<?php

namespace Kruzhalin\TestTask\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 * @package Kruzhalin\TestTask\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('kruzhalin_test_log'))
            ->addColumn('id', Table::TYPE_INTEGER, null, array(
                'identity' => true,
                'nullable' => false,
                'primary'  => true
            ))
            ->addColumn('order_id', Table::TYPE_TEXT, 255,
                [
                    'nullable' => false
                ])
            ->addColumn('factor', Table::TYPE_DECIMAL, '12,4',
                [
                    'default' => 0,
                    'comment' => 'Factor'
                ])
            ->addColumn('order_sum', Table::TYPE_DECIMAL, '12,4',
                [
                    'default' => 0,
                    'comment' => 'Order Sum'
                ])
            ->addColumn('order_sum_multi', Table::TYPE_DECIMAL, '12,4',
                [
                    'default' => 0,
                    'comment' => 'Order Sum Multiplied'
                ])
            ->addColumn('created_at', Table::TYPE_TIMESTAMP, null,
                [
                    'nullable' => false,
                    'default'  => Table::TIMESTAMP_INIT,
                    'comment'  => 'Created At'
                ])
            ->setComment('Kruzhalin Test Log');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
