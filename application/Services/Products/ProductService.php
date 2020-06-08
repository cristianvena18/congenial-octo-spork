<?php


namespace Application\Services\Products;


use Domain\Entities\Product;
use Domain\Interfaces\Repositories\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    private ProductRepositoryInterface $repository;

    public function __construct(
        ProductRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function index($page, $size): array
    {
        $page = $page ? $page : 1;
        $size = $size ? $size : 10;

        return $this->repository->index($page, $size);
    }

    public function persist(Product $product): void
    {
        $this->repository->persist($product);
    }
}
