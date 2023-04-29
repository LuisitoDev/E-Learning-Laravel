<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PaymentMethod;
use App\Models\Role;
use App\Enums\RoleEnum;
use App\Enums\PaymentMethodEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Role::create([
            "type" => RoleEnum::STUDENT
        ]);

        Role::create([
            "type" => RoleEnum::SCHOOL
        ]);

        PaymentMethod::create([
            "method" => PaymentMethodEnum::PAYPAL
        ]);

        PaymentMethod::create([
            "method" => PaymentMethodEnum::CREDIT_CARD
        ]);

        PaymentMethod::create([
            "method" => PaymentMethodEnum::FREE
        ]);
    }
}
