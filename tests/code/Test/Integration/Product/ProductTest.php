<?php

namespace Tschallacka\StormCompat\tests\code\Test\Integration\Product;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\ObjectManager;
use Magento\Framework\Exception\StateException;
use PHPUnit\Framework\TestCase;
use Tschallacka\StormCompat\Product\Attributes\AttributeVarchar;
use Tschallacka\StormCompat\Product\Product;
use Tschallacka\StormCompat\tests\code\Test\Integration\Product\Fixtures\ProductFixture;
use Tschallacka\StormInheritRelations\Behavior\InheritRelations;
/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ProductTest extends TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;
    const SIMPLE_PRODUCT_A = 'simple_a';

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
    }

    /**
     * @magentoDataFixture modifySimpleProduct
     */
    public function testProductLoad()
    {
        $product = Product::where('sku', self::SIMPLE_PRODUCT_A)->first();
        $this->assertNotNull($product);
    }

    /**
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws StateException
     */
    public static function modifySimpleProduct()
    {
        //ProductFixture::createProductFixture(self::SIMPLE_PRODUCT_A);
        $x =new Product();
        $x->save();
        // TODO model events don't get fired. Research why.
        xdebug_break();
        $products = Product::limit(1)->withAttributes()->get();
        //$attribute = new AttributeVarchar();
        xdebug_break();
        //$attribute2 = new AttributeVarchar();

        $a = 1;
    }
    /**
     * rollback
     */
    public static function modifySimpleProductRollback()
    {
        $skus = [
            self::SIMPLE_PRODUCT_A,
        ];
        array_map([ProductFixture::class, ProductFixture::DELETE_PRODUCT], $skus);
    }

}
