<?php
namespace Mastering\SampleModule\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
