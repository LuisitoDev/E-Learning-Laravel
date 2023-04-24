<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository{

    public function save($name, $first_surname, $second_surname, $birthday, $email, $password, $roles) : User
    {
        $userCreated = User::create([
            User::Name_col              => $name, 
            User::First_Surname_col     => $first_surname, 
            User::Second_Surname_col    => $second_surname, 
            User::Birthday_col          => $birthday,
            User::Email_col             => $email, 
            User::Password_col          => Hash::make($password)
            ]
        );

        foreach ($roles as $role) {
            $userCreated->user_role()->create([
                UserRole::User_col => $userCreated->id,
                UserRole::Role_col => $role
            ]);
        }

        

        return $userCreated;
    } 

    public function findByEmailPassword($email, $password)
    {
        $user = User::where('email', $email)->first();
 
        if (! $user || ! Hash::check($password, $user->password)) {
            return null;
        }
    
        return $user;
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
        return User::query()
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
        return User::query()
            ->where('id',$id)->delete();
    } 
}