<?php
/*
 * This file is part of the NEO ERP Application.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

namespace Neo\Http\Controllers\System;

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

use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Neo\Contracts\Repositories\TaxonomyRepositoryInterface;
use Neo\Http\Requests\TaxonomyRequest;
use Neo\Http\Resources\System\TaxonomyResource;
use Neo\Models\System\Taxonomy;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group System taxonomies
 *
 * APIs for managing table system of taxonomies
 */
class TaxonomyController
{

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'name' => '',
        'slug' => '',
        'code' => '',
        'description' => '',
        'parent_id' => '',
        'created_by' => '',
        'updated_by' => '',
        'deleted_by' => '',
    ];

    /**
     * @var Tools
     */
    private $meta;

    private $taxonomyRepo;

    /**
     * @param Tools $meta
     * @param TaxonomyRepositoryInterface $taxonomyRepository
     */
    public function __construct(Tools $meta, TaxonomyRepositoryInterface $taxonomyRepository)
    {
        $this->meta = $meta;
        $this->taxonomyRepo = $taxonomyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Taxonomies');
        $taxonomies = app(Pipeline::class)
            ->send(Taxonomy::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return TaxonomyResource::collection($taxonomies);
        }

        return view('taxonomies.index', compact('taxonomies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxonomies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaxonomyRequest $request
     * @return \Illuminate\Http\RedirectResponse|TaxonomyResource
     */
    public function store(TaxonomyRequest $request)
    {
        $taxonomy =  $this->taxonomyRepo->createTaxonomy($request->input());
        if ($request->expectsJson()) {
            return new TaxonomyResource($taxonomy);
        }
        return redirect()
            ->route('system.taxonomies.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|TaxonomyResource
     */
    public function show(int $id)
    {
        $taxonomy = $this->taxonomyRepo->findTaxonomyById($id);
        if (\request()->expectsJson()) {
            return new TaxonomyResource($taxonomy);
        }
        return view('taxonomies.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $taxonomy = $this->taxonomyRepo->findTaxonomyById($id);
        $data = [
            'taxonomy' => $taxonomy,
        ];

        return view('taxonomies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaxonomyRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|TaxonomyResource
     */
    public function update(TaxonomyRequest $request, int $id)
    {
        $taxonomy = $this->taxonomyRepo->findTaxonomyById($id);
        $taxonomy->update($request->input());

        if ($request->expectsJson()) {
            return new TaxonomyResource($taxonomy);
        }

        return redirect()
            ->route('system.taxonomies.index')
            ->with('success', 'Data was update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $taxonomy = $this->taxonomyRepo->findTaxonomyById($id);
        $taxonomy->delete();
        if (\request()->expectsJson()) {
            return response()->json(['data' => 'data was delete']);
        }
        return redirect()->back();
    }
}
