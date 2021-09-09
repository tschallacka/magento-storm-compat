<?php namespace Tschallacka\StormCompat\tests\code\Test\Integration\Product\Fixtures;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Catalog\Model\Product\Type;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Registry;
use Magento\TestFramework\Helper\Bootstrap;

class ProductFixture
{

    /**
     * @param $sku string
     * @return Product|mixed
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws StateException
     */
    public static function createProductFixture($sku)
    {
        $objectManager = Bootstrap::getObjectManager();
        $productRepository = $objectManager->create(ProductRepositoryInterface::class);
        $product = $objectManager->create(Product::class);
        $product->isObjectNew(true);
        $product->setTypeId(Type::TYPE_SIMPLE)
            ->setId(array_reduce(str_split($sku), function($value, $item) {return $value . ord($item);},""))
            ->setAttributeSetId(4)
            ->setName('Simple Product '.$sku)
            ->setSku($sku)
            ->setTaxClassId('none')
            ->setDescription('description')
            ->setShortDescription('short description')
            ->setPrice(10)
            ->setWeight(1)
            ->setVisibility(Visibility::VISIBILITY_BOTH)
            ->setStatus(Status::STATUS_ENABLED)
            ->setWebsiteIds([1])
            ->setCategoryIds([])
            ->setStockData(['use_config_manage_stock' => 1, 'qty' => 140, 'is_qty_decimal' => 0, 'is_in_stock' => 1])
            ->setSpecialPrice('10.00');
        $productRepository->save($product);
        return $product;
    }

    const DELETE_PRODUCT = 'deleteProductFixture';
    /**
     * @param $sku
     * @throws LocalizedException
     * @throws StateException
     */
    public static function deleteProductFixture($sku)
    {
        Bootstrap::getInstance()->getInstance()->reinitialize();

        /** @var Registry $registry */
        $registry = Bootstrap::getObjectManager()->get(Registry::class);

        $registry->unregister('isSecureArea');
        $registry->register('isSecureArea', true);

        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = Bootstrap::getObjectManager()
            ->get(ProductRepositoryInterface::class);
        try {
            $product = $productRepository->get($sku, false, null, true);
            $productRepository->delete($product);
        } catch (NoSuchEntityException $e) {
        }
        $registry->unregister('isSecureArea');
        $registry->register('isSecureArea', false);
    }
}
