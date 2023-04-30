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

    public function update($id, $title, $description)
    {
        $category = Category::query()->where('id',$id)->firstOrFail();

        $category->title = $title;
        $category->description = $description;

        return $category->save();
    }

    public function getById($id)
    {
        return Category::query()
            ->where('id',$id)->firstOrFail();
    }

    public function getAll()
    {
        $categories = Category::query()
            ->get();

        return $categories;
    }

    public function delete($id)
    {
        return Category::query()
            ->where('id',$id)->delete();
    }
}
