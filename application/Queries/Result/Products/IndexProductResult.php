<?php


namespace Application\Queries\Result\Products;


use Domain\Entities\Product;
use Infrastructure\QueryBus\Result\ResultInterface;

class IndexProductResult implements ResultInterface
{
    private array $products;

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function getProducts():array
    {
        return $this->products;
    }
}
