<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:courses,id',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'cost' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'categories' => 'required|array|min:1',
            'categories.*' => 'required|distinct|exists:categories,id',
            'file' => 'required|file|max:2048|mimes:jpg,png',
        ];
    }
}
