<?php

namespace App\Repositories\CourseCategory;

use App\Models\CourseCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CourseCategoryRepository{

    public function save($course_id, $categories)
    {
        $categoriesCreated = null;
        foreach ($categories as $category) {
            $categories[] = CourseCategory::create([
                CourseCategory::Course_col => $course_id,
                CourseCategory::Category_col => $category
            ]);
        }

        return $categoriesCreated;
    }

    public function update($id, $name, $password, $profile, $birthday)
    {
        // $user = User::query()->where('id',$id)->firstOrFail();

        // $user->name = $name;
        // $user->profile_id = $profile;
        // $user->employee->birthday = $birthday;

        // return $user->save() && $user->employee->save();
    }

    public function getById($id)
    {
        return CourseCategory::query()
            ->where('id',$id)->firstOrFail();
    }

    public function getAll()
    {
        // $users = User::query()
        //     ->with("employee")
        //     ->with("profile")
        //     ->get();

        // //Validate if users is not empty, to give formate or return empty array
        // return count($users) > 0 ? $users->map->format() : [];
    }

    public function delete($id)
    {
        return CourseCategory::query()
            ->where('id',$id)->delete();
    }
}
