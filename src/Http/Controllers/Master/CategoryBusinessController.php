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
use Illuminate\Http\Request;
use Neo\Contracts\Repositories\CategoryBusinessRepositoryInterface;
use Neo\Http\Requests\Master\CategoryBusinessRequest;
use Neo\Http\Resources\Master\CategoryBusinessResource;
use Neo\Models\Master\CategoryBusiness;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group Master Categories Business
 *
 * APIs for managing table master of Categories Business
 */
class CategoryBusinessController
{
    /**
     * @var array|string[]
     */
    protected array $fields = [
        'title' => '',
        'parent_id' => '',
        'created_by' => '',
        'updated_by' => '',
        'deleted_by' => '',
    ];

    /**
     * @var Tools
     */
    private $meta;

    private $categoryBusinessRepo;

    /**
     * @param Tools $meta
     * @param CategoryBusinessRepositoryInterface $categoryBusinessRepository
     */
    public function __construct(Tools $meta, CategoryBusinessRepositoryInterface $categoryBusinessRepository)
    {
        $this->meta = $meta;
        $this->categoryBusinessRepo = $categoryBusinessRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Business Categories');

        $categories_business = app(Pipeline::class)
            ->send(CategoryBusiness::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return CategoryBusinessResource::collection($categories_business);
        }

        return view('settings.master-data.categories-business.index', compact('categories_business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->meta->setTitle('Create Category Business');
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('settings.master-data.categories-business.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryBusinessRequest $request
     * @return \Illuminate\Http\RedirectResponse|CategoryBusinessResource
     */
    public function store(CategoryBusinessRequest $request)
    {
        $categoryBusiness = $this->categoryBusinessRepo->createCategoryBusiness($request->input());

        if ($request->expectsJson()) {
            return new CategoryBusinessResource($categoryBusiness);
        }
        return redirect()
            ->route('system.settings.master-data.tm-categories-business.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|CategoryBusinessResource
     */
    public function show(int $id)
    {
        $categoryBusiness = $this->categoryBusinessRepo->findCategoryBusinessById($id);
        if (\request()->expectsJson()) {
            return new CategoryBusinessResource($categoryBusiness);
        }

        return view('settings.master-data.categories-business.show', $categoryBusiness);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $category = CategoryBusiness::findOrFail($id);
        $data = [
            'c_business' => $category,
        ];
        return view('settings.master-data.categories-business.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryBusinessRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|CategoryBusinessResource
     */
    public function update(CategoryBusinessRequest $request, int $id)
    {
        $categoryBusiness = $this->categoryBusinessRepo->findCategoryBusinessById($id);
        $categoryBusiness->update($request->input());

        if ($request->expectsJson()) {
            return new CategoryBusinessResource($categoryBusiness);
        }
        return redirect()
            ->route('system.settings.master-data.tm-categories-business.index')
            ->with('success', 'Data was update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $categoryBusiness = $this->categoryBusinessRepo->findCategoryBusinessById($id);
        $categoryBusiness->delete();

        if (\request()->expectsJson()) {
            return response()->json('Data Was delete');
        }
        return redirect()->route('system.settings.master-data.tm-categories-business.index')
            ->with('success', 'data was delete');
    }
}
