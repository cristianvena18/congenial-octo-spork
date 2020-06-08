<?php


namespace Application\Queries\Handler\Products;


use Application\Queries\Query\Products\IndexProductQuery;
use Application\Queries\Result\Products\IndexProductResult;
use Application\Services\Products\ProductServiceInterface;
use Infrastructure\QueryBus\Handler\HandlerInterface;
use Infrastructure\QueryBus\Query\QueryInterface;
use Infrastructure\QueryBus\Result\ResultInterface;

class IndexProductHandler implements HandlerInterface
{
    private ProductServiceInterface $productService;

    public function __construct(
        ProductServiceInterface $productService
    )
    {
        $this->productService = $productService;
    }

    /**
     * @param IndexProductQuery $query
     * @return IndexProductResult
     */
    public function handle($query): ResultInterface
    {
        $products = $this->productService->index($query->getPage(), $query->getSize());

        $result = new IndexProductResult();
        $result->setProducts($products);

        return $result;
    }
}
