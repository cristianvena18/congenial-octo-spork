<?php


namespace Application\Queries\Query\Products;


use Infrastructure\QueryBus\Query\QueryInterface;

class IndexProductQuery implements QueryInterface
{
    private $page;
    private $size;

    public function __construct(
        $page = 1,
        $size = 10
    )
    {
        $this->page = $page;
        $this->size = $size;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }
}
