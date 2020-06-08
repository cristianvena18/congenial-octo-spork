<?php


namespace Presentation\Http\Actions\Products;


use App\Exceptions\InvalidBodyException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Infrastructure\CommandBus\CommandBusInterface;
use Presentation\Http\Adapters\Products\StoreProductAdapter;

class StoreProductAction
{
    private StoreProductAdapter $adapter;

    private CommandBusInterface $commandBus;

    public function __construct(
        StoreProductAdapter $adapter,
        CommandBusInterface $commandBus
    )
    {
        $this->adapter = $adapter;
        $this->commandBus = $commandBus;
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws InvalidBodyException
     */
    public function __invoke(Request $request)
    {
        $command = $this->adapter->from($request);

        $this->commandBus->handle($command);

        return redirect('/products');
    }
}
