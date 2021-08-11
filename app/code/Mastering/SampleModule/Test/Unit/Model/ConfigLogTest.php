<?php
namespace Mastering\SampleModule\Test\Unit\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use PHPUnit\Framework\TestCase;
use Mastering\SampleModule\Model\ConfigLog;

class ConfigLogTest extends TestCase
{
    /**
     * @var ConfigLog
     */
    private $configLog;
    private $interfaceMock;

    protected function setUp(): void
    {
        $this->interfaceMock = $this->createMock(ScopeConfigInterface::class);
        $this->configLog = new ConfigLog($this->interfaceMock);
    }

    public function testIsEnabled()
    {
        $this->interfaceMock->expects($this->once())
        ->method('getValue')
        ->with(ConfigLog::XML_PATH_ENABLED)
        ->willReturn(1);

        $this->assertEquals(1, $this->configLog->isEnabled());
    }
}
