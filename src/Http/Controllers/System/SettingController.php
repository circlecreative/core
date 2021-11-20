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
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

// ------------------------------------------------------------------------

use Illuminate\Http\Request;
use Neo\Models\Master\Geodirectories;
use Neo\Models\System\Setting;
use Turahe\SEOTools\Contracts\Tools as SeoToolsInterface;

/**
 *
 * @group System settings
 *
 * APIs for managing table system of settings
 */
class SettingController
{
    /**
     * @var
     */
    private $meta;
    private $config;

    /**
     *
     */
    public function __construct(Setting $setting, SeoToolsInterface $seotool)
    {
        $this->meta = $seotool;
        $this->config = $setting->options();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function setting()
    {
        $this->meta->setTitle('Setting Site');
        $fields = [
            "site_name" => "",
            "site_title" => "",
            "site_title_position" => "",
            'site_tagline' => '',
            "site_logo" => "",
            'site_status' => '',
            'site_icon' => '',
            'site_status_discourage_search' => '',
            'site_status_message' => '',
            'logo_rectangle' => '',
            'logo_rectangle_dark' => '',
            'logo_square' => '',
            'logo_square_dark' => '',
            'app_icon' => '',
            'app_name' => '',
            'app_short_name' => '',
            'app_theme_color' => '',
            'app_background_color' => '',
            "site_description" => "",
            "site_keywords" => "",
            "site_language" => "",
            "site_timezone" => "",
            "site_email" => "",
            "site_copyright" => "",
        ];

        $data = [
            'languages' => app('db')->table('tm_languages')->get(),
            'countries' => Geodirectories::where('type', 'COUNTRY')->get(),
            'timezones' => app('db')->table('tm_timezones')->get(),
            "site_logo" => \Storage::url(config('app.unique_id') . '/' . $this->config['site_icon']),
            "logo_rectangle" => "img/logo_rectangle.png",
            "logo_rectangle_dark" => "img/logo_rectangle_dark.png",
            "logo_square" => "img/logo_square.png",
            "logo_square_dark" => "img/logo_square_dark.png",
            "app_icon" => "img/app_icon.png",
        ];

        foreach (array_keys($fields) as $field) {
            $data[$field] = old($field, $this->config[$field]);
        }


        return view('settings.general', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function email()
    {
        $this->meta->setTitle('Setting email');
        $fields = [
            'email_from_name' => '',
            'email_from_address' => '',
            'email_reply_name' => '',
            'email_reply_address' => '',
            'email_mailer' => '',
            'email_sendmail_path' => '',
            'email_smtp_host' => '',
            'email_smtp_port' => '',
            'email_smtp_authentication' => '',
            'email_smtp_authentication_username' => '',
            'email_smtp_authentication_password' => '',
        ];

        $data = [
        ];
        foreach (array_keys($fields) as $field) {
            $data[$field] = old($field, $this->config[$field]);
        }

        return view('settings.email', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function integration()
    {
        $this->meta->setTitle('Setting integration');
        $fields = [
            'midtrans' => [
                'merchant_id' => '',
                'client_key' => '',
                'server_key' => '',
                'production' => '',
                'sanitized' => '',
                'enable_3ds' => '',
            ],


            'ipaymu' => [
                'api_key' => '',
                'va_number' => '',
                'production' => '',
            ],

            'google' => [
                'analytics_id' => '',
                'webmaster_id' => '',
                'tag_manager_id' => '',
                'adwords_id' => '',
                'api_application_name' => '',
                'api_application_key' => '',
            ],
            'facebook' => [
                'pixel_id' => '',
                'api_app_id' => '',
                'api_app_secret' => '',
                'api_graph_version' => '',
            ],
            'rajaongkir' => [
                'rajaongkir_key' => '',
                'rajaongkir_type' => '',
            ],
            'midtrans_enable' => '',
            'ipaymu_enable' => '',
            'google_enable' => '',
            'facebook_enable' => '',
            'rajaongkir_enable' => '',
        ];

        $data = [
        ];
        foreach (array_keys($fields) as $field) {
            $data[$field] = old($field, $this->config->get($field, null));
        }
        return view('settings.integration', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function message()
    {
        $this->meta->setTitle('Setting message');       
        $fields = [
            'citcall' => [
                'version' => '',
                'app_name' => '',
                'user_id' => '',
                'sender_id' => '',
                'api_key' => '',
                'retry' => '',
            ],
            'zenziva' => [
                'user_key' => '',
                'pass_key' => '',
            ],
            'messages_provider' =>'',
        ];

        $data = [
        ];
        foreach (array_keys($fields) as $field) {
            $data[$field] = old($field, $this->config->get($field, null));
        }
        return view('settings.message', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function saveData(Request $request)
    {
        $inputs = $request->except(['_token', 'site_icon', 'app_icon', 'logo_rectangle', 'logo_rectangle_dark', 'logo_square', 'logo_square_dark']); //Arr::except($request->input(), ['_token']);

        if (!$request->has(['site_status_discourage_search'])) {
            $inputs['site_status_discourage_search'] = "NO";
        }

        foreach ($request->file() as $key => $file) {
            $this->saveImage($request, $key);
        }

//        dd($inputs);

        foreach ($inputs as $key => $value) {
            $option = Setting::firstOrCreate(['key' => $key]);
            $option->value = is_array($value)? json_encode($value) : $value;
            $option->save();
        }


        //check is request comes via ajax?
        if ($request->expectsJson()) {
            return response()->json(['data' => $this->config], 200);
        }

        return redirect()->back()->with('success', trans('lang.settings_saved_msg'));
    }

    /**
     * Save Logo image
     *
     * @param Request $request
     * @param string $name
     */
    private function saveImage(Request $request, string $name): void
    {
        $request->validate([
            'site_icon' => 'nullable|image',
            'logo_rectangle' => 'nullable|image',
            'logo_rectangle_dark' => 'nullable|image',
            'logo_square' => 'nullable|image',
            'logo_square_dark' => 'nullable|image',
            'app_icon' => 'nullable|image',
        ]);

        if ($request->hasFile($name) && $request->file($name)->isValid()) {
            $image = \Image::make($request->file($name))->encode('png')->stream();
            \Storage::disk(config('global.default_storage', 'public'))->put(config('app.unique_id') . '/images/' . $name . '.png', $image->__toString(), 'public');
        }
    }
}
