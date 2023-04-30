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
        $categories_created = $courseCreated->categories()->sync($categories);

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
            "course" => $courseCreated,
            "categories_course" => $categories_created,
            "levels" => $levels_created
        ];
    }

    public function update($id, $title, $description, $cost, $categories, $levels)
    {
        $courseUpdated = Course::query()->where('id', $id)->firstOrFail();

        $courseUpdated->update([
            Course::Title_col => $title,
            Course::Descrption_col => $description,
            Course::Cost_col => $cost
            ]
        );

        $categories_updated = $courseUpdated->categories()->sync($categories);

        //TODO: HOW TO HANDLE UPDATE LEVELS OF COURSES WHEN WE COULD DELET THEM, ADD NEW ONES OR UDATE WAS WELL
        // $levels_updated = [];
        // foreach ($levels as $level) {
        //     $level_found = Level::query()->where('id', $level["id"])->firstOrFail();
        //     $level_found->update([
        //         Level::Title_col => $level["title"],
        //         Level::Video_Path_col => $level["video_path"],
        //         Level::PDF_Path_col => $level["pdf_path"],
        //         Level::Content_col => $level["content"],
        //         Level::Free_Trial_col => $level["free_trial"]
        //         ]
        //     );
        //     $levels_updated[] = $level_found;
        // }

        return [
            "course" => $courseUpdated,
            "categories_course" => $categories_updated,
            // "levels" => $levels_updated
        ];
    }

    public function getById($id)
    {
        return Course::query()
            ->where('id',$id)->firstOrFail();
    }

    public function getRecentCourses()
    {
        //TODO: GET PERCENTAGE OF VOTES
        $courses = Course::query()
            ->with("creator_user")
            ->with("votes")
            ->orderBy(Course::CREATED_AT, 'desc')
            ->get()->take(12);

        return $courses;
    }

    public function delete($id)
    {
        return Course::query()
            ->where('id',$id)->delete();
    }
}
