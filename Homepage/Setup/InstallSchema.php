<?php


namespace Neosoft\Homepage\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $table_neosoft_homepage_sliders = $setup->getConnection()->newTable($setup->getTable('neosoft_homepage_sliders'));

        $table_neosoft_homepage_sliders->addColumn(
            'sliders_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_neosoft_homepage_sliders->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Slider name'
        );

        $table_neosoft_homepage_sliders->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['default' => '1','nullable' => False],
            'status'
        );

        $table_neosoft_homepage_sliders->addColumn(
            'type',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['default' => '1','nullable' => False],
            '1=Desktop,2=Mobile'
        );

        $table_neosoft_homepage_sliders->addColumn(
            'url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Banner url where it will go after click'
        );

        $table_neosoft_homepage_sliders->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => False],
            'image'
        );

        $table_neosoft_homepage_sliders->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'created_at'
        );

        $table_neosoft_homepage_sliders->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'updated_at'
        );

        $table_neosoft_homepage_banner = $setup->getConnection()->newTable($setup->getTable('neosoft_homepage_banner'));

        $table_neosoft_homepage_banner->addColumn(
            'banner_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_neosoft_homepage_banner->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => False],
            'name'
        );

        $table_neosoft_homepage_banner->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['default' => '1','nullable' => False],
            'status'
        );

        $table_neosoft_homepage_banner->addColumn(
            'type',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['default' => '1','nullable' => False],
            '1=Desktop,2=Mobile'
        );

        $table_neosoft_homepage_banner->addColumn(
            'url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'url'
        );

        $table_neosoft_homepage_banner->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'image'
        );

        $table_neosoft_homepage_banner->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'created_at'
        );

        $table_neosoft_homepage_banner->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'updated_at'
        );

        $setup->getConnection()->createTable($table_neosoft_homepage_banner);

        $setup->getConnection()->createTable($table_neosoft_homepage_sliders);
    }
}
