<?php
namespace Mastering\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * @codeCoverageIgnore
 */
class Item extends AbstractModel
{
    protected $_eventPrefix = 'mastering_sample_item';
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mastering\SampleModule\Model\ResourceModel\Item');
    }
}
