<?php


namespace Presentation\Http\Presenters\Products;


use Application\Queries\Result\Products\IndexProductResult;

class IndexProductPresenter
{
    private IndexProductResult $result;

    public function fromResult($result): IndexProductPresenter
    {
        $this->result = $result;
        return $this;
    }

    public function getData(): array
    {
        $data = $this->result->getProducts();
        return $data ? $data : [];
    }
}
