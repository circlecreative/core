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
use Neo\Models\Master\Language;
use Illuminate\Pipeline\Pipeline;
use Neo\Http\Controllers\Controller;
use Turahe\SEOTools\Contracts\Tools;
use Neo\Http\Requests\Master\LanguageRequest;
use Neo\Http\Resources\Master\LanguageResource;
use Neo\Contracts\Repositories\LanguageRepositoryInterface;

/**
 *
 * @group Master languages
 *
 * APIs for managing table master of languages
 */
class LanguageController extends Controller
{

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'code' => '',
        'name' => '',
        'native' => '',
    ];

    /**
    * @var Tools
    */
    private $meta;

    private $languageRepo;

    /**
     * @param Tools $meta
     * @param LanguageRepositoryInterface $languageRepository
     */
    public function __construct(Tools $meta, LanguageRepositoryInterface $languageRepository)
    {
        $this->meta = $meta;
        $this->languageRepo = $languageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Languages');
        $languages = app(Pipeline::class)
            ->send(Language::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return LanguageResource::collection($languages);
        }

        return view('settings.master-data.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.master-data.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LanguageRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function store(LanguageRequest $request)
    {
        $language = $this->languageRepo->createLanguage($request->input());

        if ($request->expectsJson()) {
            return LanguageResource::collection($language);
        }
        return redirect()
            ->route('system.settings.master-data.tm-languages.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|LanguageResource
     */
    public function show(int $id)
    {
        $language = $this->languageRepo->findLanguageById($id);
        if (\request()->expectsJson()) {
            return new LanguageResource($language);
        }
        return view('settings.master-data.languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $language = $this->languageRepo->findLanguageById($id);
        $data = [
            'language' => $language,
        ];
        return view('settings.master-data.languages.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LanguageRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|LanguageResource
     */
    public function update(LanguageRequest $request, int $id)
    {
        $language = $this->languageRepo->findLanguageById($id);
        $language->update($request->input());
        if ($request->expectsJson()) {
            return new LanguageResource($language);
        }
        return redirect()
            ->route('system.settings.master-data.tm-languages.index')
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
        $language = $this->languageRepo->findLanguageById($id);
        $language->delete();

        if (\request()->expectsJson()) {
            return response()->json('Data Was delete');
        }
        return redirect()->route('system.settings.master-data.tm-banks.index')
            ->with('success', 'data was delete');
    }
}
