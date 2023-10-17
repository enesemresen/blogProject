<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;


class PostController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = PostResource::collection(Post::all());
        return response()->json([
            'data' => $posts,
        ]);
    }

    public function store(CreatePostRequest $request): JsonResponse
    {
        return response()->json([
            'data' => new PostResource(Post::create($request->validated())),
        ]);
    }

    public function show(Post $post): JsonResponse
    {
        return response()->json([
            'data' => new PostResource($post),
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $post->update($request->validated());

        return response()->json([
            'data' => new PostResource($post->fresh()),
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([], 204);
    }
}
