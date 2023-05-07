<?php

namespace Tests\Feature;

use App\Enums\RoleEnum;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserTest extends TestCase
{
    const USER_ROUTE = "/api/user";
    const ROLE_ROUTE = "/api/role";

    public function test_register_school_user()
    {
        $response = $this->registerUser(RoleEnum::SCHOOL);

        $response->assertStatus(200);
    }

    public function test_register_student_user()
    {
        $response = $this->registerUser(RoleEnum::STUDENT);

        $response->assertStatus(200);
    }

    public function test_login()
    {
        $response = UserTest::loginUser($this);

        $response->assertStatus(200);
    }


    static public function loginUser($instance)
    {
        return $instance->post(UserTest::USER_ROUTE . "/login",
        [
            "email" => "luis@gmail.com",
            "password" => '123456'
        ]
        );
    }

    private function registerUser(string $p_role)
    {
        $response = $this->get(self::ROLE_ROUTE . "/");

        $roles = $response["roles"];

        if (count($roles) === 0)
            $this->assertTrue(false);

        $roles_id = null;
        foreach ($roles as $role) {
            if ($role[Role::Type_col] === $p_role)
                $roles_id[] = $role[Role::Id_col];
        }

        return $this->post(self::USER_ROUTE . "/register",
        [
            "name" => fake()->firstName,
            "first_surname" => fake()->lastName,
            "second_surname" => fake()->lastName,
            "birthday" => fake()->dateTimeBetween('1980-01-01', '2005-01-01')->format('d-m-Y'),
            "email" => fake()->email(),
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "roles" => $roles_id
        ]
        );
    }
}
