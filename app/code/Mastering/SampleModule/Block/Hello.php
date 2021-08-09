<?php
namespace Mastering\SampleModule\Block;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    private $eventManager;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = [],
        ManagerInterface $eventManager
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->eventManager = $eventManager;
        parent::__construct($context, $data);
    }

    /**
     *  @return \Mastering\SampleModule\Model\Item[]
     */
    public function getItems()
    {
        $this->eventManager->dispatch('entered_table_page');
        return $this->collectionFactory->create()->getItems();
    }
}
