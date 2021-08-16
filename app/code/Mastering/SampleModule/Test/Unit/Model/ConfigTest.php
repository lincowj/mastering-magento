<?php
namespace Mastering\SampleModule\Test\Unit\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Mastering\SampleModule\Model\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * @var Config
     */
    private $config;
    private $interfaceMock;

    protected function setUp(): void
    {
        $this->interfaceMock = $this->getMockForAbstractClass(ScopeConfigInterface::class);
        $this->config = new Config($this->interfaceMock);
    }

    public function testIsEnabled()
    {
        $this->interfaceMock->expects($this->once())
        ->method('getValue')
        ->with(Config::XML_PATH_ENABLED)
        ->willReturn(1);

        $this->assertEquals(1, $this->config->isEnabled());
    }
}
