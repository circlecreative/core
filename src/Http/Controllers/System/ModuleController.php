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
use Nwidart\Modules\Contracts\RepositoryInterface as ModuleRepositoryInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Turahe\SEOTools\Contracts\Tools as SeoToolInterface;

/**
 *
 * @group System Module
 *
 * APIs for managing table system of module
 */
class ModuleController
{
    private $meta;
    private $module;
    public function __construct(SeoToolInterface $meta, ModuleRepositoryInterface $module)
    {
        $this->meta = $meta;
        $this->module = $module;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $this->meta->setTitle('Modules');
        $modules = $this->module->all();

        if (\request()->expectsJson()) {
            return response()->json($modules);
        }
        return view('system.modules.index', compact('modules'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function install(Request $request)
    {
        $file = $request->file('file');
        $filename = $file->store('tmp');
        $zip = new \ZipArchive;
        $zipFile =storage_path('app/'.$filename);
        if ($zip->open($zipFile) === true) {
            $zip->extractTo(config('modules.paths.modules'));
            $zip->close();
            unlink($zipFile);
            return redirect()->back()->with('info', "Module  install successful.");
        } else {
            return redirect()->back()->with('info', "Module  install unsuccessful.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRepo($name)
    {
        $module = $this->module->findOrFail($name);
        $process = new Process(['cd C:\laragon\www\projects\circle\neo-erp\app\Modules\Blog', 'git pull origin master']);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        return redirect()->back()->with('info', $process->getOutput());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($name)
    {
        /** @var \Nwidart\Modules\Module $module */
        $module = $this->module->findOrFail($name);

        if ($module->isDisabled()) {
            $module->enable();
            return redirect()->back()->with('success', "Module [{$module}] enabled successful.");
        } else {
            $module->disable();
            return redirect()->back()->with('info', "Module [{$module}] disable successful.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($name)
    {
        $module = $this->module->findOrFail($name);

        if ($module) {
            $module->delete();

            return redirect()->back()->with('info', "Module [{$module}] delete successful.");
        }

        return redirect()->back()->with('warning', "Module Not found.");
    }
}
