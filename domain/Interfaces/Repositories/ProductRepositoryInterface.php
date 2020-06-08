<?php


namespace Domain\Interfaces\Repositories;


use Domain\Entities\Product;

interface ProductRepositoryInterface
{
    /**
     * @param int $page
     * @param int $size
     * @return Product[]
     */
    public function index(int $page, int $size): array;

    public function persist(Product $product): void;

    /**
     * @param int $id
     * @return Product|null|object
     */
    public function findById(int $id);
}
