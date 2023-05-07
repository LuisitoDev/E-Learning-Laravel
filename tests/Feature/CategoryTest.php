<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    const CATEGORY_ROUTE = "/api/category";

    public function test_create()
    {
        $response = UserTest::loginUser($this);

        $auth_token = $response["auth_token"];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $auth_token,
        ])->post(
            self::CATEGORY_ROUTE . '/',
            [
                "title" => fake()->languageCode,
                "description" => fake()->sentence,
            ]
        );

        $response->assertStatus(200);
    }
}
