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

namespace Neo\Core\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Neo\Core\Models\System\Media;
use Neo\Core\Observers\MediaObserver;
use Neo\Core\Services\Schema\Macros\Macro;
use Neo\Core\Models\System\Setting;

class NeoCoreServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Media::observe(MediaObserver::class);

        $this->mergeConfigFrom(__DIR__.'../../config/core.php', 'core');

        if (config('core.migration.enable')) {
            $databasePath = __DIR__.'../../migrations';
            $this->loadMigrationsFrom($databasePath);
        }

        if (class_exists(\Illuminate\Foundation\Application::class)) {
            $this->publishes(
                [
                    __DIR__.'../../config/core.php' => config_path('core.php'),
                ],
                'config'
            );
        }

        $this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'core');

        Paginator::useBootstrap();
        Config::set('global', $this->options());

        $this->seotools();
        $this->installed();

        $userStampsMacro = new Macro;
        $userStampsMacro->register();
    }

    /**
     * get apps option from database.
     */
    protected function options()
    {
        if (Schema::hasTable('sys_settings') && !$this->app->runningInConsole()) {
            $settings = (new Setting())->options();


            return $settings;
        }
    }

    /**
     * get installer if apps not installed.
     */
    private function installed()
    {
        $filename = storage_path('installed');
        if (file_exists($filename) && class_exists('Turahe\LaravelInstaller\Providers\LaravelInstallerServiceProvider')) {
            $this->app->register(\Turahe\LaravelInstaller\Providers\LaravelInstallerServiceProvider::class);
        }
    }

    private function seotools()
    {
        if (!$this->app->runningInConsole() && $data = $this->options()) {

//            dd($data);
//            View::share('settings', $data);
            Config::set(['seotools' => [
                'meta' => [
                    /*
                     * The default configurations to be used by the meta generator.
                     */
                    'defaults' => [
                        'title' => $data['site_name'], // set false to total remove
                        'titleBefore' => false, // Put defaults.title before page title, like 'My Title - Dashboard'
                        'description' => $data['site_description'], // set false to total remove
                        'separator' => ' - ',
                        'keywords' => $data['site_tagline'] ? [$data['site_tagline']] : false,
                        'canonical' => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
                        'robots' => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
                    ],
                    /*
                     * Webmaster tags are always added.
                     */
                    'webmaster_tags' => [
                        'google' => $data['webmaster_google'] ?? null,
                        'bing' => $data['webmaster_bing'] ?? null,
                        'alexa' => $data['webmaster_alexa'] ?? null,
                        'pinterest' => $data['webmaster_pinterest'] ?? null,
                        'yandex' => $data['webmaster_yandex'] ?? null,
                        'norton' => $data['webmaster_norton'] ?? null,
                    ],

                    'add_notranslate_class' => false,
                ],
                'opengraph' => [
                    /*
                     * The default configurations to be used by the opengraph generator.
                     */
                    'defaults' => [
                        'title' => $data['site_name'], // set false to total remove
                        'description' => $data['site_description'], // set false to total remove
                        'url' => false, // Set null for using Url::current(), set false to total remove
                        'type' => false,
                        'site_name' => false,
                        'images' => ['/image/img/app_icon.png', 'height' => 1024, 'width' => 1024],
                    ],
                ],
                'twitter' => [
                    /*
                     * The default values to be used by the twitter cards generator.
                     */
                    'defaults' => [
                    ],
                ],
                'json-ld' => [
                    /*
                     * The default configurations to be used by the json-ld generator.
                     */
                    'defaults' => [
                        'title' => $data['site_name'], // set false to total remove
                        'description' => $data['site_description'], // set false to total remove
                        'url' => false, // Set null for using Url::current(), set false to total remove
                        'type' => 'WebPage',
                        'images' => [],
                    ],
                ],

                'manifest' => [
                    'name' => $data['site_name'],
                    'short_name' => $data['site_name'],
                    'start_url' => $data['site_url'],
                    'background_color' => '#ffffff',
                    'theme_color' => '#000000',
                    'display' => 'standalone',
                    'orientation' => 'any',
                    'status_bar' => 'black',
                    'icons' => [
                        '72x72' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=72',
                            'purpose' => 'any'
                        ],
                        '96x96' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=96',
                            'purpose' => 'any'
                        ],
                        '128x128' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=128',
                            'purpose' => 'any'
                        ],
                        '144x144' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=144',
                            'purpose' => 'any'
                        ],
                        '152x152' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=152',
                            'purpose' => 'any'
                        ],
                        '192x192' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=192',
                            'purpose' => 'any'
                        ],
                        '384x384' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=384',
                            'purpose' => 'any'
                        ],
                        '512x512' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/app_icon.png?w=512',
                            'purpose' => 'any'
                        ],
                    ],
                    'splash' => [
                        'ldpi_portrait' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=200',
                            'height' => 200,
                            'width' => 320
                        ],
                        'ldpi_landscape' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=320',
                            'height' => 320,
                            'width' => 200
                        ],
                        'mdpi_portrait' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=320',
                            'height' => 320,
                            'width' => 480
                        ],
                        'mdpi_landscape' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=480',
                            'height' => 480,
                            'width' => 320
                        ],
                        'hdpi_portrait' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=480',
                            'height' => 480,
                            'width' => 720
                        ],
                        'hdpi_landscape' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=720',
                            'height' => 720,
                            'width' => 480
                        ],
                        'xhdpi_portrait' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=640',
                            'height' => 640,
                            'width' => 960
                        ],
                        'xhdpi_landscape' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=960',
                            'height' => 960,
                            'width' => 640
                        ],
                        'xxhdpi_portrait' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=960',
                            'height' => 960,
                            'width' => 1440
                        ],
                        'xxhdpi_landscape' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=1440',
                            'height' => 1440,
                            'width' => 960
                        ],
                        'xxxhdpi_portrait' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=1280',
                            'height' => 1280,
                            'width' => 1920
                        ],
                        'xxxhdpi_landscape' => [
                            'path' => '/image/' . env('APP_ID', 'default') . '/img/logo_rectangle.png?w=1920',
                            'height' => 1920,
                            'width' => 1280
                        ],

                    ],
                    'shortcuts' => [
                        [
                            'name' => 'Shortcut Link 1',
                            'description' => 'Shortcut Link 1 Description',
                            'url' => '/shortcutlink1',
                            'icons' => [
                                "src" => "/image/72x72.png",
                                "purpose" => "any"
                            ]
                        ],
                        [
                            'name' => 'Shortcut Link 2',
                            'description' => 'Shortcut Link 2 Description',
                            'url' => '/shortcutlink2'
                        ]
                    ],
                    'custom' => []
                ]
            ]]);
        }
    }
}
