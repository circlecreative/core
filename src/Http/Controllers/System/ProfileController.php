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
namespace Neo\Http\Controllers\System;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Neo\Contracts\Repositories\ProfileRepositoryInterface;
use Neo\Contracts\Repositories\SettingRepositoryInterface;
use Neo\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Neo\Http\Requests\System\AddressRequest;
use Neo\Http\Requests\System\ProfileRequest;
use Neo\Models\System\Setting;
use Neo\Models\System\User;
use PragmaRX\Google2FA\Google2FA;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 *
 * @group System profile
 *
 * APIs for managing table system of profile
 */
class ProfileController extends Controller
{
    private $profileRepo;
    /**
     * @var
     */
    private $settingsService;

    public function __construct(ProfileRepositoryInterface $profileRepo, SettingRepositoryInterface $settingsService, Google2FA $google2fa)
    {
        $this->profileRepo = $profileRepo;
        $this->settingsService = $settingsService;
        $this->google2fa = $google2fa;
    }

    /**
     * @param string $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException
     * @throws \PragmaRX\Google2FA\Exceptions\InvalidCharactersException
     * @throws \PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException
     * @version 1.0.0
     */
    public function show($type = 'personal')
    {
        $google2fa = $this->google2fa;
        $secret2fa = $google2fa->generateSecretKey();
        $qrcontext = $google2fa->getQRCodeUrl(
            config('global.site_name'),
            auth()->user()->email,
            $secret2fa
        );

        return view('profile.index', [
            'type' => $type,
            'activities' => auth()->user()->logs,
            'secret2fa' => $secret2fa,
            'qrcode2fa' => $qrcontext,
        ]);
    }

    /**
     * @return array|string
     * @throws \Throwable
     * @version 1.0.0
     */
    public function showPersonal()
    {
        return view('profile.personal')->render();
    }

    /**
     * @return array|string
     * @throws \Throwable
     * @version 1.0.0
     */
    public function showSettings()
    {
        return view('profile.settings')->render();
    }

    /**
     * @return array|string
     * @throws \Throwable
     * @version 1.0.0
     * @version 1.0.0
     */
    public function showActivity()
    {
        $activities = Activity::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->take(20)->get();
        return view('profile.activity', compact('activities'))->render();
    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException
     * @version 1.0.0
     */
    public function updatePersonalInfo(ProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->profileRepo->savePersonalInfo($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages(['invalid' => __('Sorry, we are unable to update profile.')]);
        }

        return response()->json(['title' => 'Updated Profile', 'msg' => __('Your profile has been successfully changed.')]);
    }

    /**
     * @param AddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @version 1.0.0
     */
    public function updateAddressInfo(AddressRequest $request)
    {
        $this->profileRepo->saveAddressInfo($request);
        return response()->json(['title' => 'Updated Address', 'msg' => __('Your address has been successfully updated.')]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @version 1.0.0
     */
    public function saveSettings(Request $request)
    {
        $updated = false;
        $validFields = [ "profile_settings" ];
        $input = $request->only($validFields);

        if (!empty($input)) {
            $updated = true;
            foreach ($input as $setting) {
                $key = $setting['option'] ?? '';
                $value = $setting['value'] ?? '';
                if ($this->isValidOption($key)) {
                    $this->settingsService->updateSettings($key, $value);
                } else {
                    $updated =  false;
                }
            }
        }
        if ($updated) {
            return response()->json(['title' => __('Profile Updated'), 'msg' => __('Your profile settings updated successfully.')]);
        }
        return response()->json(['type' => 'warning', 'title' => __('Update Failed'), 'msg' => __('Sorry, unable to update your profile setting.')]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException
     * @version 1.0.0
     */
    public function changeEmail(Request $request)
    {
        $this->validate($request, [
            'user_new_email' => "required|email|max:190|not_in:" . $request->user()->email . "|unique:users,email," . auth()->user()->id,
        ], [
            'user_new_email.not_in' => __("The new email address cannot be the same as your current email address."),
            'user_new_email.unique' => __("The chosen email is already registered with us. Please use a different email address."),
        ]);

        $this->settingsService->changeEmail($request);

        return response()->json(['msg' => __("Now we need to verify your new email address. We have sent an email to new email (:new_email) to verify your address. Please check your inbox (including spam folder) for the verification link.", ['new_email' => $request->input('user_new_email')])]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @version 1.0.0
     */
    public function verifyChangeEmail(Request $request)
    {
        $this->settingsService->verifyChangeEmail($request);
        return redirect()->route('auth.login.form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @version 1.0.0
     */
    public function resendVerification(Request $request)
    {
        $this->settingsService->resendVerification($request);
        return response()->json(['msg' => __("We've sent a verification link to your new email.")]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @version 1.0.0
     */
    public function cancelRequest(Request $request)
    {
        $this->settingsService->cancelRequest($request);
        return response()->json(['msg' => __('Request for email change has been cancelled.')]);
    }

    /**
     * @param Request $request
     * @throws ValidationException
     * @version 1.0.0
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => "required|max:190|min:6|different:new_password",
            'new_password' => "required|confirmed|max:190|min:6",
        ], [
            'current_password.different' => __("The new password should be different than your current password."),
            'new_password.*' => __("The password should be minimum 6 character and match with your confirmed password."),
        ]);

        $this->settingsService->changePassword($request);
    }

    /**
     * @param Request $request
     * @param $state
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException
     * @version 1.0.0
     * @since 1.0
     */
    public function google2fa(Request $request, $state)
    {
        if (!in_array($state, ['disable', 'enable'])) {
            throw ValidationException::withMessages(['invalid' => __('Sorry, we are unable to proceed your request.')]);
        }

        if ($state == 'disable') {
            $this->validate($request, [
                'google2fa_code' => 'required',
            ], [
                'google2fa_code.required' => __('The authentication code is required to disable.'),
            ]);
        } else {
            $this->validate($request, [
                'google2fa_code' => 'required',
                'google2fa_secret' => 'required'
            ], [
                'google2fa_code.required' => __('The authentication code is required to enable.'),
                'google2fa_secret.required' => __('The secret key is missing for authentication.'),
            ]);
        }

        $code   = $request->input('google2fa_code');
        $secret = ($state == 'enable') ? $request->input('google2fa_secret') : data_get(auth()->user(), '2fa', 0);

        try {
            $valid = $this->google2fa->verifyKey($secret, $code);
        } catch (\Exception $e) {
            $valid = false;
            throw ValidationException::withMessages(['invalid' => __('Sorry, unable to verify authentication code.')]);
        }

        if ($valid) {
            $update = ($state == 'disable') ? 0 : $secret;
            auth()->user()->update(['2fa' => $update]);

            $upmsg  = ($state == 'disable') ? __('2FA authentication successfully disabled.') : __('2FA authentication successfully enabled.');
            return response()->json(['msg' => $upmsg, 'reload' => 800]);
        } else {
            throw ValidationException::withMessages(['invalid' => __("You've entered wrong authentication code.")]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @version 1.0.0
     * @since 1.0
     */
    public function deleteActivity(Request $request, $id)
    {
        UserActivity::where('id', $id)->where('user_id', auth()->user()->id)->delete();

        if ($request->ajax()) {
            return response()->json(['msg' => __('You have deleted your login entry.'), 'reload' => 800]);
        }

        return redirect()->route('profile.view', ['activity']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @version 1.0.0
     * @since 1.0
     */
    public function clearActivity(Request $request)
    {
        LogsActivity::where('user_id', auth()->user()->id)->delete();

        Setting::updateOrCreate([
            'user_id' => User::class,
            'meta_key' => 'last_clear_activity',
        ], ['meta_value' => Carbon::now()->timestamp]);

        if ($request->ajax()) {
            return response()->json(['msg' => __('You have cleared your loging activities log.'), 'reload' => 800]);
        }

        return redirect()->route('profile.view', 'activity');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @version 1.0.0
     * @since 1.0
     */
    public function updatePreference(Request $request)
    {
        $update = $request->only(['meta', 'value', 'type']);
        if (!blank($update) && isset($update['meta'])) {
            $meta = $update['meta'] ?? false;
            if ($this->isValidMetaKey($meta)) {
                $type = $update['type'] ?? '';
                $value = isset($update['value']) ? strip_tags($update['value']) : '';
                $key = ($type) ? $type.'_'.$meta : $meta;

                if ($this->isValidMetaValue($value, $meta)) {
                    $this->settingsService->updateSettings($key, $value);
                    return response()->json(['msg' => __('Setting has been successfully updated.')]);
                }
            }
        }
        return response()->json(['type' => 'warning', 'msg' => __('Failed to update setting. You may need to reload the page to try again.')]);
    }

    /**
     * @param $name
     * @return boolean
     * @version 1.0.0
     * @since 1.0
     */
    public function isValidOption($name)
    {
        $fields = ['setting_activity_log', 'setting_unusual_activity'];
        return in_array($name, $fields);
    }

    /**
     * @param $meta
     * @return boolean
     * @version 1.0.0
     * @since 1.0
     */
    public function isValidMetaKey($meta)
    {
        $keys = ['perpage', 'display', 'order', 'sortpg'];
        return in_array($meta, $keys);
    }

    /**
     * @param $value
     * @param $meta
     * @return boolean
     * @version 1.0.0
     * @since 1.0
     */
    public function isValidMetaValue($value, $meta)
    {
        $what = [
            'perpage' => 'pgtn_pr_pg',
            'display' => 'pgtn_dnsty',
            'sortpg' => 'pgtn_sort_pg',
            'order' => 'pgtn_order'
        ];

        if ($this->isValidMetaKey($meta)) {
            $config_key = $what[$meta] ?? '';
            if ($config_key) {
                $config = config('investorm.'.$config_key);
                return in_array($value, $config);
            }
        }
        return false;
    }
}
