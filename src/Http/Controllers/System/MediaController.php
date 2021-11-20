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
namespace Neo\Http\Controllers\System;

use Illuminate\Http\Request;
use Neo\Http\Resources\System\MediaResource;
use Neo\Models\System\Media;
use Neo\Http\Controllers\Controller;
use Turahe\SEOTools\Contracts\Tools;
use Neo\Libraries\Media\MediaUploader;
use Illuminate\Support\Facades\Storage;

/**
 *
 * @group System Media
 *
 * APIs for managing table system of media
 */
class MediaController extends Controller
{
    private $meta;

    public function __construct(Tools $meta)
    {
        $this->meta = $meta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $this->meta->setTitle('Media');
        $medias = Media::all();

        if (\request()->expectsJson()) {
            return MediaResource::collection($medias);
        }
        return view('medias.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $files = $request->file('file');
        // Default usage
        foreach ($files as $file) {
            MediaUploader::fromFile($file)->upload();
        }
        return response()->json(['data' => 'Media Was uploaded']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $media = Media::findOrFail($id);
        
        if(\request()->ajax() || \request()->expectsJson()){
            $data['media'] = $media;
            $data['svg'] = $media->getSVG();
            $data['created_at'] = $media->created_at->format('M d, Y');
            $data['updated_at'] = $media->updated_at->format('M d, Y');
            unset($media->created_at);
            unset($media->updated_at);
            return response()->json(['data' => $data]);
        }else{
            return redirect()->route('system.media.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        Media::find($id)->update($request->input());
        return redirect()
            ->route('system.media.index')
            ->with('success', 'File was update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $files =  Storage::files($id);
        Storage::delete($files);
        Storage::deleteDirectory($id);
        Media::destroy($id);
    }

    
}
