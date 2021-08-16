<?php
namespace Mastering\SampleModule\Test\Unit\Model;

use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ItemRepository;
use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use PHPUnit\Framework\TestCase;

class ItemRepositoryTest extends TestCase
{
    private $itemRepository;
    private $collectionFactoryMock;

    public function setUp(): void
    {
        $this->collectionFactoryMock = $this->createMock(CollectionFactory::class);
        $this->itemRepository = new ItemRepository($this->collectionFactoryMock);
    }

    public function testGetList()
    {
        $collectionMock = $this->createMock(Collection::class);
        $this->collectionFactoryMock->expects($this->once())
        ->method('create')
        ->willReturn($collectionMock);

        $collectionMock->method('getItems')
        ->willReturn([1, 2, 3, 4, 5]);

        $this->assertCount(5, $this->itemRepository->getList());
    }
}
