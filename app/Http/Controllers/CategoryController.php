<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $category = CategoryResource::collection(Category::all());
        return response()->json([
            'data' => $category,
        ]);
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        return response()->json([
            'data' => new CategoryResource(Category::create($request->validated())),
        ]);
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json([
            'data' => new CategoryResource($category),
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());

        return response()->json([
            'data' => new CategoryResource($category->fresh()),
        ]);
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return response()->json([], 204);
    }
}
