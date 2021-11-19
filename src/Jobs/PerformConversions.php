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
namespace Neo\Core\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Neo\Core\Services\Media\ImageManipulator;
use Neo\Core\Models\System\Media;

class PerformConversions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var Media */
    protected $media;

    /** @var array */
    protected $conversions;

    /**
     * Create a new job instance.
     *
     * @param Media $media
     * @param array $conversions
     * @return void
     */
    public function __construct(Media $media, array $conversions)
    {
        $this->media = $media;

        $this->conversions = $conversions;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        app(ImageManipulator::class)->manipulate(
            $this->media,
            $this->conversions
        );
    }

    /** @return Media */
    public function getMedia()
    {
        return $this->media;
    }

    /** @return array */
    public function getConversions()
    {
        return $this->conversions;
    }
}
