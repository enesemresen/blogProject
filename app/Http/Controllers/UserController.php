<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = UserResource::collection(User::all());
        return response()->json([
            'data' => $users,
        ]);
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        return response()->json([
            'data' => new UserResource(User::create($request->validated())) ,
        ]);
    }
 
    public function show(User $user): JsonResponse
    {
        return response()->json([
            'data' => new UserResource($user),
        ]);
    }
   
    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return response()->json([
            'data' => new UserResource($user->fresh()),
        ]);
    }
    
    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json([], 204);
    }
}
