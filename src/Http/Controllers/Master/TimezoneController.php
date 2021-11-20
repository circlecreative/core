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
use Neo\Models\Master\Timezone;
use Illuminate\Pipeline\Pipeline;
use Neo\Http\Controllers\Controller;
use Turahe\SEOTools\Contracts\Tools;
use Neo\Http\Requests\Master\TimezoneRequest;
use Neo\Http\Resources\Master\TimezoneResource;
use Neo\Contracts\Repositories\TimezoneRepositoryInterface;

/**
 *
 * @group Master timezones
 *
 * APIs for managing table master of timezones
 */
class TimezoneController extends Controller
{

    /**
     * @var array|string[]
     */
    protected array $fields = [
        'value' => '',
        'abbr' => '',
        'offset' => '',
        'isdst' => '',
        'text' => '',
        'utc' => '',
    ];

    /**
     * @var Tools
     */
    private $meta;

    private $timezoneRepo;

    /**
     * @param Tools $meta
     * @param TimezoneRepositoryInterface $timezoneRepository
     */
    public function __construct(Tools $meta, TimezoneRepositoryInterface $timezoneRepository)
    {
        $this->meta = $meta;
        $this->timezoneRepo = $timezoneRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Timezones');
        $timezones = app(Pipeline::class)
            ->send(Timezone::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));

        if ($request->expectsJson()) {
            return TimezoneResource::collection($timezones);
        }

        return view('settings.master-data.timezones.index', compact('timezones'));
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
        return view('settings.master-data.timezones.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TimezoneRequest $request
     * @return \Illuminate\Http\RedirectResponse|TimezoneResource
     */
    public function store(TimezoneRequest $request)
    {
        $timezone = $this->timezoneRepo->createTimezone($request->input());
        if ($request->expectsJson()) {
            return new TimezoneResource($timezone);
        }
        return redirect()
            ->route('system.settings.master-data.tm-timezones.index')
            ->with('success', 'Data was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|TimezoneResource
     */
    public function show(int $id)
    {
        $timezone = $this->timezoneRepo->findTimezoneById($id);
        if (\request()->expectsJson()) {
            return new TimezoneResource($timezone);
        }
        return view('settings.master-data.timezones.show', compact('timezone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $timezone = $this->timezoneRepo->findTimezoneById($id);
        $data = [
            'timezone' => $timezone,
        ];
        return view('settings.master-data.timezones.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TimezoneRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|TimezoneResource
     */
    public function update(TimezoneRequest $request, int $id)
    {
        $timezone = $this->timezoneRepo->findTimezoneById($id);
        $timezone->update($request->input());
        if ($request->expectsJson()) {
            return new TimezoneResource($timezone);
        }
        return redirect()
            ->route('system.settings.master-data.tm-timezones.index')
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
        $timezone = $this->timezoneRepo->findTimezoneById($id);
        $timezone->delete();

        if (\request()->expectsJson()) {
            return response()->json('Data Was delete');
        }
        return redirect()->route('system.settings.master-data.tm-banks.index')
            ->with('success', 'data was delete');
    }
}
