<?php

namespace App\Repositories\Course;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CourseRepository{

    public function save($title, $description, $cost, $categories, $levels)
    {
        $courseCreated = Course::create([
            Course::Title_col => $title,
            Course::Descrption_col => $description,
            Course::Cost_col => $cost,
            Course::Creator_User_col => 1
            ]
        );

        $categories_created = [];
        foreach ($categories as $category) {
            $categories_created[] = $courseCreated->course_category()->create([
                CourseCategory::Category_col => $category
            ]);
        }

        $levels_created = [];
        foreach ($levels as $level) {
            $levels_created[] = $courseCreated->levels()->create([
                Level::Title_col => $level["title"],
                Level::Video_Path_col => $level["video_path"],
                Level::PDF_Path_col => $level["pdf_path"],
                Level::Content_col => $level["content"],
                Level::Free_Trial_col => $level["free_trial"]
            ]);
        }

        return [
            "course: " => $courseCreated,
            "categories_course" => $categories_created,
            "levels" => $levels_created
        ];
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
        return Course::query()
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
        return Course::query()
            ->where('id',$id)->delete();
    }
}
