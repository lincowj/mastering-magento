<?php
namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'brand' => 'Fiat',
                'model' => '500',
                'plate' => 'GPE-7E76'
            ]
        );
        
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'brand' => 'Volkswagen',
                'model' => 'Taos',
                'plate' => 'JNX-9E44'
            ]
        );
        
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'brand' => 'Lincoln',
                'model' => 'Nautilus',
                'plate' => 'QOF-7C50'
            ]
        );
        
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'brand' => 'Hyundai',
                'model' => 'HB20',
                'plate' => 'RLF-3I85'
            ]
        );
        
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'brand' => 'Chevrolet',
                'model' => 'Onix',
                'plate' => 'ANG-4G15'
            ]
        );

        $setup->endSetup();
    }
}