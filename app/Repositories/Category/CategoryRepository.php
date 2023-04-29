<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryRepository{

    public function save($title, $description) : Category | null
    {
        $categoryCreated = Category::create([
            Category::Title_col             => $title,
            Category::Description_col       => $description,
            Category::Creator_User_col      => 1
            ]
        );

        return $categoryCreated;
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
        return Category::query()
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
        return Category::query()
            ->where('id',$id)->delete();
    }
}
