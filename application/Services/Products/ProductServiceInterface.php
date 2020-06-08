<?php


namespace Application\Services\Products;


use Domain\Entities\Product;

interface ProductServiceInterface
{
    /**
     * @param int $page
     * @param int $size
     * @return Product[]
     */
    public function index(int $page, int $size): array;

    public function persist(Product $product): void;
}
