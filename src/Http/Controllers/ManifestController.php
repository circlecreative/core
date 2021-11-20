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
namespace Neo\Http\Controllers;

use Neo\Libraries\ManifestService;

/**
 * Generate manifest json
 */
class ManifestController
{
    /**
     * @param ManifestService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(ManifestService $service)
    {
        return response()->json($service->manifestJson());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function offline()
    {
        return view('layouts.offline');
    }
}
