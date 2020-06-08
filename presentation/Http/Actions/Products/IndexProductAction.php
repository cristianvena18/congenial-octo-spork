<?php


namespace Presentation\Http\Actions\Products;


use App\Exceptions\InvalidBodyException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Infrastructure\QueryBus\QueryBusInterface;
use Presentation\Http\Adapters\Products\IndexProductAdapter;
use Presentation\Http\Presenters\Products\IndexProductPresenter;

class IndexProductAction
{
    private IndexProductAdapter $adapter;

    private QueryBusInterface $queryBus;

    private IndexProductPresenter $presenter;

    public function __construct(
        IndexProductAdapter $adapter,
        QueryBusInterface $queryBus,
        IndexProductPresenter $presenter
    )
    {
        $this->adapter = $adapter;
        $this->queryBus = $queryBus;
        $this->presenter = $presenter;
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws InvalidBodyException
     */
    public function __invoke(Request $request)
    {
        $query = $this->adapter->from($request);

        $result = $this->queryBus->handle($query);

        return view('productsList')->with(['products' => $this->presenter->fromResult($result)->getData() ]);
    }
}
