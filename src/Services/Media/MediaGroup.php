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

namespace Neo\Core\Services\Media;

class MediaGroup
{
    /** @var array */
    protected $conversions = [];

    /**
     * Register the conversions to be performed when media is attached.
     *
     * @param string ...$conversions
     * @return $this
     */
    public function performConversions(...$conversions)
    {
        $this->conversions = $conversions;

        return $this;
    }

    /**
     * Determine if there are any registered conversions.
     *
     * @return bool
     */
    public function hasConversions()
    {
        return ! empty($this->conversions);
    }

    /**
     * Get all the registered conversions.
     *
     * @return array
     */
    public function getConversions()
    {
        return $this->conversions;
    }

}
