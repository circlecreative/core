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
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

// ------------------------------------------------------------------------

use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Neo\Contracts\Repositories\TagRepositoryInterface;
use Neo\Http\Requests\Tags\CreateRequest;
use Neo\Http\Requests\Tags\UpdateRequest;
use Neo\Http\Resources\System\TagResource;
use Neo\Models\System\Tag;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group System tags
 *
 * APIs for managing table system of tags
 */
class TagController
{

    /**
     * @var Tools
     */
    private $meta;

    private $tagRepo;

    /**
     * @param Tools $meta
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(Tools $meta, TagRepositoryInterface $tagRepository)
    {
        $this->meta = $meta;
        $this->tagRepo = $tagRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Tags');

        $tags = app(Pipeline::class)
            ->send(Tag::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return TagResource::collection($tags);
        }

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|TagResource
     * @throws \Exception
     */
    public function store(CreateRequest $request)
    {
        $tag = $this->tagRepo->createTag($request->input());
        if ($request->expectsJson()) {
            return new TagResource($tag);
        }
        return redirect()
            ->route('system.tags.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|TagResource
     */
    public function show(int $id)
    {
        $tag = $this->tagRepo->findTagById($id);

        if (\request()->expectsJson()) {
            return new TagResource($tag);
        }
        return view('tags.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $tag = $this->tagRepo->findTagById($id);
        $data = [
            'tag' => $tag,
        ];
        return view('tags.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|TagResource
     */
    public function update(UpdateRequest $request, int $id)
    {
        $tag = $this->tagRepo->findTagById($id);
        $tag->update($request->input());

        if ($request->expectsJson()) {
            return new TagResource($tag);
        }
        return redirect()
            ->route('system.tags.index')
            ->with('success', 'Data was update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $tag = $this->tagRepo->findTagById($id);
        $tag->delete();

        return response()->json(['data' => 'data was delete']);
    }

    /**
     * Copy the specified resource from storage.
     *
     * @param \Neo\Models\int $id
     * @return \Illuminate\Http\Response
     */
    public function copy($id)
    {
    }
}
