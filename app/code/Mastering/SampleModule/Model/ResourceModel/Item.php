<?php
namespace Mastering\SampleModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\{AbstractDb, Context};

/**
 * @codeCoverageIgnore
 */
class Item extends AbstractDb
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('mastering_sample_item', 'id');
    }
}
