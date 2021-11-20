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
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------

use Illuminate\Pipeline\Pipeline;
use Neo\Contracts\Repositories\UserRepositoryInterface;
use Neo\Http\Requests\UserRequest;
use Neo\Http\Resources\System\UserResource;
use Neo\Models\System\User;
use Illuminate\Http\Request;
use Turahe\SEOTools\Contracts\Tools;

/**
 *
 * @group System users
 *
 * APIs for managing table system of users
 */
class UserController
{
    private $meta;
    private $userRepo;

    public function __construct(Tools $meta, UserRepositoryInterface $userRepository)
    {
        $this->meta = $meta;
        $this->userRepo = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Users');

        $users = app(Pipeline::class)
            ->send(User::query())
            ->through([
                \Neo\Http\Pipelines\QueryFilters\Sort::class,
                \Neo\Http\Pipelines\QueryFilters\Search::class,
            ])
            ->thenReturn()
            ->paginate($request->input('limit', 12));


        if ($request->expectsJson()) {
            return UserResource::collection($users);
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->meta->setTitle('Create User');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|UserResource
     */
    public function store(UserRequest $request)
    {
        $user =  $this->userRepo->createUser($request->input());
        if ($request->expectsJson()) {
            return new UserResource($user);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|UserResource
     */
    public function show(int $id)
    {
        $user = $this->userRepo->findUserById($id);
        $this->meta->setTitle($user->username);
        if (\request()->expectsJson()) {
            return new UserResource($user);
        }
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = $this->userRepo->findUserById($id);
        $this->meta->setTitle($user->username);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|UserResource
     */
    public function update(UserRequest $request, int $id)
    {
        $user = $this->userRepo->findUserById($id);
        $user->update($request->input());
        if ($request->expectsJson()) {
            return new UserResource($user);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $user = $this->userRepo->findUserById($id);
        $user->delete();
        if (\request()->expectsJson()) {
            return response()->json(['data' => 'data was delete']);
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {
        $this->meta->setTitle('Profile');
        $user = $request->user();
        if ($request->expectsJson()) {
            return response()->json(['data' => 'data was delete']);
        }
        return view('users.profile', compact('user'));
    }
    /**
    * @param Request $request
    * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    */
    public function editProfile(Request $request)
    {
        $this->meta->setTitle('Edit Profile');
        $user = $request->user();
        return view('users.edit-profile', compact('user'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request, int $id)
    {
        $user = $this->userRepo->findUserById($id);
        $user->update($request->input());

        if ($request->expectsJson()) {
            return response()->json(['data' => 'data was delete']);
        }

        return redirect()
            ->route('system.people.profile.index')
            ->with('success', 'Profile Was updated');
    }
}
