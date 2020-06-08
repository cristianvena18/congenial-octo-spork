<?php


namespace Application\Commands\Handler\Products;


use Application\Commands\Command\Products\StoreProductCommand;
use Application\Services\Products\ProductServiceInterface;
use Domain\Entities\Product;
use Infrastructure\CommandBus\Handler\HandlerInterface;

class StoreProductHandler implements HandlerInterface
{
    private ProductServiceInterface $productService;

    public function __construct(
        ProductServiceInterface $productService
    )
    {
        $this->productService = $productService;
    }

    /**
     * @param StoreProductCommand $command
     */
    public function handle($command): void
    {
        $product = new Product();

        $product->setName($command->getName());
        $product->setDescription($command->getDescription());
        $product->setPrice($command->getPrice());
        $product->setStock($command->getStock());

        $this->productService->persist($product);
    }
}
