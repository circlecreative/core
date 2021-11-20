<?php
/**
 * This file is part of the NEO ERP Application.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------
namespace Neo\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Neo\Contracts\Repositories\BankRepositoryInterface;
use Neo\Http\Requests\Master\BankRequest;
use Neo\Http\Resources\Master\BankResource;
use Neo\Models\Master\Bank;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group Master Banks
 *
 * APIs for managing table master of banks
 */
class BankController
{

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'name' => '',
        'alias' => '',
        'company' => '',
        'code' => ''
    ];

    /**
     * @var Tools
     */
    private $meta;

    private $bankRepo;

    /**
     * @param Tools $meta
     * @param BankRepositoryInterface $bankRepository
     */
    public function __construct(Tools $meta, BankRepositoryInterface $bankRepository)
    {
        $this->meta = $meta;
        $this->bankRepo = $bankRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Banks');

        $banks = app(Pipeline::class)
            ->send(Bank::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return BankResource::collection($banks);
        }

        return view('settings.master-data.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->meta->setTitle('Create Bank');
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('settings.master-data.banks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BankRequest $request
     * @return \Illuminate\Http\RedirectResponse|BankResource
     */
    public function store(BankRequest $request)
    {
        $bank = $this->bankRepo->createbank($request->input());

        if ($request->expectsJson()) {
            return new BankResource($bank);
        }
        return redirect()
            ->route('system.settings.master-data.tm-banks.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|BankResource
     */
    public function show(int $id)
    {
        $bank = $this->bankRepo->findbankById($id);
        $this->meta->setTitle('Bank Title');

        if (\request()->expectsJson()) {
            return new BankResource($bank);
        }

        return view('settings.master-data.banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $bank = $this->bankRepo->findbankById($id);
        $this->meta->setTitle("Edit {$bank->name}");
        $data = [
            'bank' => $bank,
        ];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $bank->$field);
        }
        return view('settings.master-data.banks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BankRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|BankResource
     */
    public function update(BankRequest $request, int $id)
    {
        $bank = $this->bankRepo->findbankById($id);
        $bank->update($request->input());
        if ($request->expectsJson()) {
            return new BankResource($bank);
        }
        return redirect()
            ->route('system.settings.master-data.tm-banks.index')
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
        $bank = $this->bankRepo->findbankById($id);
        $bank->delete();

        if (\request()->expectsJson()) {
            return response()->json('Data Was delete');
        }
        return redirect()->route('system.settings.master-data.tm-banks.index')
            ->with('success', 'data was delete');
    }
}
