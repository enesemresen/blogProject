<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\PostResource;


class CommentController extends Controller
{
    public function index(): JsonResponse
    {
        $comments = CommentResource::collection(Comment::all());
        return response()->json([
            'data' => $comments,
        ]);
    }

    public function store(CreateCommentRequest $request): JsonResponse
    {
        return response()->json([
            'data' => new CommentResource(Comment::create($request->validated())),
        ]);
    }

    public function show(Comment $comment): JsonResponse
    {
        return response()->json([
            'data' => new CommentResource($comment),
        ]);
    }

    public function update(UpdateCommentRequest $request, Comment $comment): JsonResponse
    {
        $comment->update($request->validated());

        return response()->json([
            'data' => new CommentResource($comment->fresh()),
        ]);
    }

    public function destroy(Comment $comment): JsonResponse
    {
        $comment->delete();
        return response()->json([], 204);
    }
}
