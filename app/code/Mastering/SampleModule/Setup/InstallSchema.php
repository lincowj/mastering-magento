<?php
namespace Mastering\SampleModule\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('mastering_sample_item'))
            ->addColumn('id', Table::TYPE_INTEGER, null, ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true], 'Car ID')
            ->addColumn('brand', Table::TYPE_TEXT, 255, [], 'Car Brand')
            ->addColumn('model', Table::TYPE_TEXT, 255, ['nullable' => false], 'Car Model')
            ->addColumn('plate', Table::TYPE_TEXT, 255, [], 'Car Plate')
            ->addIndex($installer->getIdxName('mastering_sample_item', ['plate']), ['plate'])
            ->setComment('Cars');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
