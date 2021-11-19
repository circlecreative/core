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

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Neo\Core\Models\System\Setting;

class ManifestService
{
    /**
     * @return Collection
     */
    public function manifestJson(): Collection
    {
        $config = (new Setting())->options();

        $basicManifest = [
            'name' => $config['site_name'],
            'short_name' => $config['site_title'],
            'start_url' => url('/'),
            'display' => $config['display'],
            'theme_color' => $config['theme_color'],
            'background_color' => $config['background_color'],
            'orientation' => $config['orientation'],
            'status_bar' => $config['status_bar'],
            'prefer_related_applications' => true,
        ];

        foreach (config('seotools.manifest.icons') as $size => $file) {
            $fileInfo = pathinfo($file['path']);
            $basicManifest['icons'][] = [
                'src' => Storage::url($file['path']),
                'type' => 'image/' . $fileInfo['extension'],
                'sizes' => $size,
                'purpose' => $file['purpose'],
            ];
        }

        if (config('seotools.manifest.shortcuts')) {
            foreach (config('seotools.manifest.shortcuts') as $shortcut) {
                if (array_key_exists('icons', $shortcut)) {
                    $fileInfo = pathinfo($shortcut['icons']['src']);
                    $icon = [
                        'src' => $shortcut['icons']['src'],
                        'type' => 'image/' . $fileInfo['extension'],
                        'purpose' => $shortcut['icons']['purpose'],
                    ];
                    if (isset($shortcut['icons']['sizes'])) {
                        $icon['sizes'] = $shortcut['icons']['sizes'];
                    }
                } else {
                    $icon = [];
                }

//                $basicManifest['shortcuts'][] = [
//                    'name' => trans($shortcut['name']),
//                    'description' => trans($shortcut['description']),
//                    'url' => $shortcut['url'],
//                    'icons' => [
//                        $icon,
//                    ],
//                ];
            }
        }

//        foreach (config('site.manifest.custom') as $tag => $value) {
//            $basicManifest[$tag] = $value;
//        }

        return new Collection($basicManifest);
    }
}
