<?php
/**
 * This file is part of the NEO ERP Application.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

// ------------------------------------------------------------------------
namespace Neo\Http\Controllers\Master;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;
use Neo\Contracts\Repositories\CurrencyRepositoryInterface;
use Neo\Http\Requests\Master\CurrencyRequest;
use Neo\Http\Resources\Master\CurrencyResource;
use Neo\Models\Master\Currency;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group Master currencies
 *
 * APIs for managing table master of currencies
 */
class CurrencyController
{

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'priority' => '',
        'iso_code' => '',
        'name' => '',
        'symbol' => '',
        'disambiguate_symbol' => '',
        'alternate_symbols' => '',
        'subunit' => '',
        'subunit_to_unit' => '',
        'symbol_first' => '',
        'html_entity' => '',
        'decimal_mark' => '',
        'thousands_separator' => '',
        'iso_numeric' => '',
        'smallest_denomination' => '',
        'exchange_rate' => '',
        'status' => '',
    ];

    /**
     * @var Tools
     */
    private $meta;

    private $currencyRepo;

    /**
     * @param Tools $meta
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(Tools $meta, CurrencyRepositoryInterface $currencyRepository)
    {
        $this->meta = $meta;
        $this->currencyRepo = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('currencies');
        $currencies = app(Pipeline::class)
            ->send(Currency::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return CurrencyResource::collection($currencies);
        }

        return view('settings.master-data.currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.master-data.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|CurrencyResource
     */
    public function store(CurrencyRequest $request)
    {
        $currency = $this->currencyRepo->createCurrency($request->input());
        if ($request->expectsJson()) {
            return new CurrencyResource($currency);
        }
        return redirect()
            ->route('system.settings.master-data.tm-currencies.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|CurrencyResource
     */
    public function show(int $id)
    {
        $currency = $this->currencyRepo->findCurrencyById($id);
        if (\request()->expectsJson()) {
            return new CurrencyResource($currency);
        }
        return view('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $currency = $this->currencyRepo->findCurrencyById($id);
        $data = [
            'currency' => $currency,
        ];
        return view('settings.master-data.currencies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|CurrencyResource
     */
    public function update(CurrencyRequest $request, int $id)
    {
        $currency =  $this->currencyRepo->findCurrencyById($id);
        $currency->update($request->input());

        if ($request->expectsJson()) {
            return new CurrencyResource($currency);
        }
        return redirect()
            ->route('system.settings.master-data.tm-currencies.index')
            ->with('success', 'Data was update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $currency =  $this->currencyRepo->findCurrencyById($id);
        $currency->delete();

        if (\request()->expectsJson()) {
            return response()->json('Data Was delete');
        }
        return redirect()->route('system.settings.master-data.tm-banks.index')
            ->with('success', 'data was delete');
    }
}
