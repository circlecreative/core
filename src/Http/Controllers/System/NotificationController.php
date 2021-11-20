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
// ------------------------------------------------------------------------
namespace Neo\Http\Controllers\System;

use Illuminate\Support\Facades\Auth;
use Neo\Http\Controllers\Controller;
use Neo\Http\Resources\System\NotificationResource;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group System notification
 *
 * APIs for managing table system of notification
 */
class NotificationController extends Controller
{
    private $meta;
    public function __construct(Tools $meta)
    {
        $this->meta = $meta;
    }

    /**
     * Show the notifications for the current user.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $this->meta->setTitle('Notifications');
        $notifications = Auth::user()->unreadNotifications->markAsRead();

        if (\request()->expectsJson()) {
            return NotificationResource::collection($notifications);
        }

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Mark all Notifications As Read.
     */
    public function markAllNotificationsAsRead()
    {
        $notifications =  Auth::user()->unreadNotifications->markAsRead();

        if (\request()->expectsJson()) {
            return NotificationResource::collection($notifications);
        }

        return response('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Ramsey\Uuid\Uuid $notification
     * @throws \Exception
     * @return
     */
    public function destroy($notification)
    {
        Auth::user()->notifications()->findOrFail($notification)->delete();

        if (request()->expectsJson()) {
            return  response()->json(['data' => 'Notification was deleted']);
        }

        return redirect()
            ->back()
            ->with('success', trans('messages.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroyAll()
    {
        Auth::user()->notifications()->delete();

        if (request()->expectsJson()) {
            return  response()->json(['data' => 'Notification was deleted']);
        }

        return redirect()
            ->back()
            ->with('success', trans('messages.deleted'));
    }
}
