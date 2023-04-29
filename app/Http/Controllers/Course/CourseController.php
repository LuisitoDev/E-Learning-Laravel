<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Repositories\Course\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository) {
        $this->courseRepository = $courseRepository;
    }

    public function addCourse(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'cost' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'categories' => 'required|array|min:1',
            'categories.*' => 'required|distinct|exists:categories,id',
            'file' => 'required|file|max:2048|mimes:jpg,png',
            'levels' => 'required|array|min:1',
            'levels.*.title' => 'required|string|max:255',
            'levels.*.video_path' => 'required|string',
            'levels.*.pdf_path' => 'string|max:255',
            'levels.*.content' => 'string|max:255',
            'levels.*.free_trial' => 'required|boolean'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $courseCreated = $this->courseRepository->save(
            $request->title,
            $request->description,
            $request->cost,
            $request->categories,
            $request->levels
        );

        if ($courseCreated == null)
            return response([
                "message" => "error"
            ])->header('Content-Type','application/json');


        return response([
            "message" => "success",
            "data" => $courseCreated,
        ])->header('Content-Type','application/json');
    }

    public function example(Request $request)
    {
        return response([
            "message" => "example"
        ])->header('Content-Type','application/json');
    }
}
