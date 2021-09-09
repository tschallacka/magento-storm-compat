<?php

namespace Tschallacka\StormCompat\tests\code\Test\Integration\Product;


use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\ObjectManager;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BaseTest extends TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;


    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    public function testUnitWorking()
    {
        $this->assertTrue(true);
    }

}
