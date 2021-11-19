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
namespace Neo\Core\Observers;


use Illuminate\Support\Str;
use Neo\Core\Models\System\Media;

class MediaObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param Media $media
     * @return void
     */
    public function created(Media $media)
    {
        $media->uuid = Str::uuid();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param Media $media
     * @return void
     */
    public function updated(Media $media)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param Media $media
     * @return void
     */
    public function deleted(Media $media)
    {
        //
    }

    /**
     * Handle the User "forceDeleted" event.
     *
     * @param Media $media
     * @return void
     */
    public function forceDeleted(Media $media)
    {
        //
    }
}
