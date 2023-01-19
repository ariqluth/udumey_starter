<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{

    public function index()
    {
        return UserResource::collection(User::paginate(5));
    }


    public function store(StoreUserURequest $request)
    {
        return new UserResource(Quote::create($request->validated()));
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}