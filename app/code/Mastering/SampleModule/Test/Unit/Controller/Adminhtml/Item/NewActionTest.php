<?php
namespace Mastering\SampleModule\Test\Unit\Controller\Adminhtml\Item;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Mastering\SampleModule\Controller\Adminhtml\Item\NewAction;
use PHPUnit\Framework\TestCase;

class NewActionTest extends TestCase
{
    private $newAction;
    private $resultFactoryMock;
    private $resultInterfaceMock;

    protected function setUp(): void
    {
        $this->resultFactoryMock = $this->createMock(ResultFactory::class);
        $contextMock = $this->createMock(Context::class);
        $contextMock->method('getResultFactory')->willReturn($this->resultFactoryMock);
        $this->newAction = new NewAction($contextMock);
        $this->resultInterfaceMock = $this->getMockForAbstractClass(ResultInterface::class);
    }

    public function testExecute()
    {
        $this->resultFactoryMock
        ->method('create')
        ->with(ResultFactory::TYPE_PAGE)
        ->willReturn($this->resultInterfaceMock);

        $this->assertEquals($this->resultInterfaceMock, $this->newAction->execute());
    }
}
