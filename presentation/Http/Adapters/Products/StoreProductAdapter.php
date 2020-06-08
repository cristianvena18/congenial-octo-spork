<?php


namespace Presentation\Http\Adapters\Products;


use App\Exceptions\InvalidBodyException;
use Application\Commands\Command\Products\StoreProductCommand;
use Illuminate\Http\Request;
use Presentation\Http\Validations\Schemas\StoreProductSchema;
use Presentation\Http\Validations\Utils\ValidatorServiceInterface;

class StoreProductAdapter
{
    private ValidatorServiceInterface $validatorService;

    private StoreProductSchema $schema;

    public function __construct(
        ValidatorServiceInterface $validatorService,
        StoreProductSchema $schema
    )
    {
        $this->validatorService = $validatorService;
        $this->schema = $schema;
    }

    /**
     * @param Request $request
     * @return StoreProductCommand
     * @throws InvalidBodyException
     */
    public function from(Request $request)
    {
        $this->validatorService->make($request->all(), $this->schema->getRules());

        if(!$this->validatorService->isValid())
        {
            throw new InvalidBodyException($this->validatorService->getErrors());
        }

        return new StoreProductCommand(
            $request->input('name'),
            $request->input('description'),
            $request->input('price'),
            $request->input('stock')
        );
    }
}
