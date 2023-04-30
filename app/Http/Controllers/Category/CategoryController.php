<?php

namespace App\Http\Controllers\Category;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->getAll();

        return response([
            "categories" => $categories
        ])->header('Content-Type','application/json');
    }

    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categoryCreated = $this->categoryRepository->save(
            $request->title,
            $request->description
        );

        if ($categoryCreated == null)
            return response([
                "message" => "error"
            ])->header('Content-Type','application/json');


        return response([
            "message" => "success"
        ])->header('Content-Type','application/json');
    }

    public function updateCategory(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categoryCreated = $this->categoryRepository->update(
            $request->id,
            $request->title,
            $request->description
        );

        if ($categoryCreated == null)
            return response([
                "message" => "error"
            ])->header('Content-Type','application/json');


        return response([
            "message" => "success"
        ])->header('Content-Type','application/json');
    }


    public function deleteCategory(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'id' => 'required|exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categoryDeleted = $this->categoryRepository->delete($request->id);

        if ($categoryDeleted == null)
            return response([
                "message" => "error"
            ])->header('Content-Type','application/json');


        return response([
            "message" => "success"
        ])->header('Content-Type','application/json');
    }

}
