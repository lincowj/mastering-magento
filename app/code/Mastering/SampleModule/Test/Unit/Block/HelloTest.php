<?php
namespace Mastering\SampleModule\Test\Unit\Block;

use Magento\Framework\Event\ManagerInterface;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;
use Mastering\SampleModule\Block\Hello;
use Mastering\SampleModule\Model\ConfigLog;
use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    private $hello;
    private $contextMock;
    private $collectionFactoryMock;
    private $managerMock;
    private $configMock;
    private $collectionMock;

    public function setUp(): void
    {
        $this->contextMock = $this->createMock(Context::class);
        $this->collectionFactoryMock = $this->createMock(CollectionFactory::class);
        $this->managerMock = $this->getMockForAbstractClass(ManagerInterface::class);
        $this->configMock = $this->createMock(ConfigLog::class);
        $this->collectionMock = $this->createMock(Collection::class);
        $this->hello = new Hello(
            $this->contextMock, 
            $this->collectionFactoryMock, 
            [],
            $this->managerMock,
            $this->configMock
        );
    }

    /**
     * @dataProvider dataProviderEvents
     */
    public function testGetItems(?bool $isEnabled, int $exactly)
    {
        $this->configMock->expects($this->once())
        ->method('isEnabled')
        ->willReturn($isEnabled);

        $this->managerMock->expects($this->exactly($exactly))
        ->method('dispatch')
        ->with('entered_table_page');

        $this->collectionFactoryMock->expects($this->once())
        ->method('create')
        ->willReturn($this->collectionMock);

        $this->collectionMock->method('getItems')
        ->willReturn([1, 2, 3, 4, 5]);

        $this->assertCount(5, $this->hello->getItems());
    }

    /**
     * @codeCoverageIgnore
     */
    public function dataProviderEvents(): array
    {
        return [
            'event dispatch' => [
                'isEnabled' => true,
                'exactly' => 1
            ],
            'event not dispatched' => [
                'isEnabled' => null,
                'exactly' => 0
            ]
        ];
    }
}

