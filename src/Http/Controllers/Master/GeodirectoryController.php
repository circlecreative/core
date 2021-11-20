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

use Illuminate\Pipeline\Pipeline;
use Neo\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Neo\Contracts\Repositories\GeodirectoryRepositoryInterface;
use Neo\Http\Requests\Master\GeodirectoryRequest;
use Neo\Http\Resources\Master\GeodirectoryResource;
use Neo\Models\Master\Geodirectories;
use Neo\Repositories\GeodirectoryRepository;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group Master Geodirectories
 *
 * APIs for managing table master of Geodirectories
 */
class GeodirectoryController extends Controller
{

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'name' => '',
        'type' => '',
        'code' => '',
    ];

    /**
     * @var Tools
     */
    private $meta;

    private $geodirectoryRepo;

    /**
     * @param Tools $meta
     * @param GeodirectoryRepositoryInterface $geodirectoryRepository
     */
    public function __construct(Tools $meta, GeodirectoryRepositoryInterface $geodirectoryRepository)
    {
        $this->meta = $meta;
        $this->geodirectoryRepo = $geodirectoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Geo directories');
        $geodirectories = app(Pipeline::class)
            ->send(Geodirectories::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return GeodirectoryResource::collection($geodirectories);
        }

        return view('settings.master-data.geodirectories.index', compact('geodirectories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('settings.master-data.geodirectories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GeodirectoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|GeodirectoryResource
     */
    public function store(GeodirectoryRequest $request)
    {
        $geodirectory =  $this->geodirectoryRepo->createGeodirectory($request->input());

        if ($request->expectsJson()) {
            return new GeodirectoryResource($geodirectory);
        }
        return redirect()
            ->route('system.settings.master-data.tm-geodirectories.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|GeodirectoryResource
     */
    public function show(int $id)
    {
        $geodirectory =  $this->geodirectoryRepo->findGeodirectoryById($id);

        if (\request()->expectsJson()) {
            return new GeodirectoryResource($geodirectory);
        }
        return view('settings.master-data.geodirectories.show', compact('geodirectory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $geodirectory =  $this->geodirectoryRepo->findGeodirectoryById($id);
        $data = [
            'geodirectory' => $geodirectory,
        ];

        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $geodirectory->$field);
        }
        return view('settings.master-data.geodirectories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GeodirectoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|GeodirectoryResource
     * @throws \Exception
     */
    public function update(GeodirectoryRequest $request, int $id)
    {
        $geodirectory = $this->geodirectoryRepo->findGeodirectoryById($id);
        $geodirectoryRepo =  new GeodirectoryRepository($geodirectory);
        $geodirectoryRepo->updateGeodirectory($request->input());
        if ($request->expectsJson()) {
            return new GeodirectoryResource($geodirectory);
        }
        return redirect()
            ->route('system.settings.master-data.tm-geodirectories.index')
            ->with('success', 'Data was update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $geodirectory = $this->geodirectoryRepo->findGeodirectoryById($id);
        $geodirectoryRepo =  new GeodirectoryRepository($geodirectory);
        $geodirectoryRepo->deleteGeodirectory();

        if (\request()->expectsJson()) {
            return response()->json('Data Was delete');
        }
        return redirect()->route('system.settings.master-data.tm-banks.index')
            ->with('success', 'data was delete');
    }
}
