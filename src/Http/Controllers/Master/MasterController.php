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

use Neo\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function __invoke()
    {
        $tables = \DB::connection()->getDoctrineSchemaManager()->listTableNames();

        $collection = collect($tables)->filter(function ($item) {
            return stristr($item, 'tm');
        });

        return view('settings.master-data', [
            'master' => $collection
        ]);
    }
}
