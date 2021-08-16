<?php

namespace Mastering\SampleModule\Test\Unit\Controller\Adminhtml\Item;

use PHPUnit\Framework\TestCase;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;
use Mastering\SampleModule\Controller\Adminhtml\Index\Index;
use Mastering\SampleModule\Controller\Adminhtml\Item\NewAction;

class IndexTest extends TestCase
{
    private $contextMock;
    private $pageFactoryMock;
    private $pageMock;
    private $index;

    protected function setUp(): void
    {
        $this->contextMock = $this->createMock(Context::class);
        $this->pageFactoryMock = $this->createMock(PageFactory::class);
        $this->pageMock = $this->createMock(Page::class);
        $this->index = new Index($this->contextMock, $this->pageFactoryMock);
    }

    public function testExecute()
    {
        $this->pageFactoryMock->expects($this->once())
        ->method('create')
        ->willReturn($this->pageMock);

        $this->assertEquals($this->pageMock, $this->index->execute());
    }
}