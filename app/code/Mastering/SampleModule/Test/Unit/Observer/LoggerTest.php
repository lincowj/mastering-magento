<?php
namespace Mastering\SampleModule\Test\Unit\Observer;

use Magento\Framework\Event;
use Magento\Framework\Event\Observer;
use Mastering\SampleModule\Observer\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class LoggerTest extends TestCase
{
    private $loggerMock;
    private $observer;
    private $observerMock;
    private $eventMock;

    protected function setUp(): void
    {
        $this->loggerMock = $this->getMockForAbstractClass(LoggerInterface::class);
        $this->observer = new Logger($this->loggerMock);
        $this->observerMock = $this->createMock(Observer::class);
        $this->eventMock = $this->createMock(Event::class);
    }

    public function testExecute()
    {
        $this->eventMock->expects($this->once())
        ->method('getName')
        ->willReturn('TestEvent');

        $this->observerMock->expects($this->once())
        ->method('getEvent')
        ->willReturn($this->eventMock);

        $this->loggerMock->expects($this->once())
        ->method('debug')
        ->with('TestEvent');

        $this->observer->execute($this->observerMock);
    }
}