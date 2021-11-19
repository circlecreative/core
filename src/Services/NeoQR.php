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

namespace Neo\Core\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class NeoQR
{
    /**
     * @param string $qrcode
     * @param int $size
     *
     * @return object|boolean
     */
    public static function generate($qrcode = null, $size = null)
    {
        $def  = 125;
        $size = (!empty($size)) ? (int) $size : $def;

        if ($qrcode) {
            $qrsize = ($size) ? $size : $def;
            return QrCode::size($qrsize)->generate($qrcode);
        }

        return '';
    }
}
