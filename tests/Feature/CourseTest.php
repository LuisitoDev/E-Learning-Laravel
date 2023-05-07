<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CourseTest extends TestCase
{
    const COURSE_ROUTE = "/api/course";

    public function test_create()
    {
        $response = UserTest::loginUser($this);

        $auth_token = $response["auth_token"];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $auth_token,
        ])->post(
            self::COURSE_ROUTE . '/',
            [
                "title" => fake()->jobTitle,
                "description" => fake()->sentence,
                "cost" => fake()->randomDigit,
                "categories" => [1, 2, 3],
                "file" => UploadedFile::fake()->image('photo.jpg'),
                "levels" => [
                    0 => [
                        "title" => "#1 - " . fake()->sentence,
                        "video_path" => fake()->word,
                        "pdf_path" => fake()->word,
                        "content" => fake()->sentence,
                        "free_trial" => fake()->boolean()
                    ],
                    1 => [
                        "title" => "#2 - " . fake()->sentence,
                        "video_path" => fake()->word,
                        "pdf_path" => fake()->word,
                        "content" => fake()->sentence,
                        "free_trial" => fake()->boolean()
                    ],
                    2 => [
                        "title" => "#3 - " . fake()->sentence,
                        "video_path" => fake()->word,
                        "pdf_path" => fake()->word,
                        "content" => fake()->sentence,
                        "free_trial" => fake()->boolean()
                    ]
                ]
            ]
        );

        $response->dump();

        $response->assertStatus(200);
    }
}
