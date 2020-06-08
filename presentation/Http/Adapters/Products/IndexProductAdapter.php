<?php


namespace Presentation\Http\Adapters\Products;


use App\Exceptions\InvalidBodyException;
use Application\Queries\Query\Products\IndexProductQuery;
use Illuminate\Http\Request;
use Presentation\Http\Validations\Schemas\IndexProductSchema;
use Presentation\Http\Validations\Utils\ValidatorServiceInterface;

class IndexProductAdapter
{
    private ValidatorServiceInterface $validatorService;

    private IndexProductSchema $schema;

    public function __construct(
        ValidatorServiceInterface $validatorService,
        IndexProductSchema $schema
    )
    {
        $this->validatorService = $validatorService;
        $this->schema = $schema;
    }

    /**
     * @param Request $request
     * @return IndexProductQuery
     * @throws InvalidBodyException
     */
    public function from(Request $request)
    {
        $this->validatorService->make($request->all(), $this->schema->getRules());

        if(!$this->validatorService->isValid()){
            throw new InvalidBodyException($this->validatorService->getErrors());
        }

        return new IndexProductQuery(
            $request->query('page'),
            $request->query('size')
        );
    }
}
