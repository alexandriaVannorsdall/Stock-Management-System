<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Password;

class UserController
{
    /**
     * Retrieves a list of users.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Display a specific user.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request
     * @return UserResource
     */
    public function store(Request $request): UserResource
    {
        $validated = $request->validate([
            'data' => 'required|array',
            'data.name'=> 'required|string',
            'data.email'=> 'required|string',
            'data.password' => ['required', Password::min(8)->mixedCase()],
        ]);

        $user = new User();

        $user->fill($validated['data'])->saveOrFail();

        return new UserResource($user);
    }

    /**
     * Updates a specific user.
     *
     * @param Request $request
     * @return UserResource
     */
    public function update(Request $request, User $user): UserResource
    {
        $validated = $request->validate([
            'data' => 'required|array',
            'data.name'=> 'required|string',
            'data.email'=> 'required|string'
        ]);

        $user->fill($validated['data'])->save();

        return new UserResource($user);
    }

    /**
     * Deletes a specific user.
     *
     * @param User $user
     * @return Response
     */
    public function delete(User $user): Response
    {
        $user->delete();
        return response(null, 204);
    }
}
