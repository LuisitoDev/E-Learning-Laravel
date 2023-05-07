<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|exists:'.Role::table_name.','.Role::Id_col
        ]);

        $user = $this->userRepository->findByEmailPassword($request->email, $request->password, $request->role);

        if ($user == null) {
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);
            return response([
                "error"
            ])->header('Content-Type','application/json');
        }

        // return $user->createToken($request->device_name)->plainTextToken;
        return response([
            "auth_token" => $user->createToken('auth_token')->plainTextToken
        ])->header('Content-Type','application/json');

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'first_surname' => 'required|max:255',
            'second_surname' => 'max:255',
            'birthday' => 'required|before_or_equal:' .  Date('Y-m-d'),
            'email' => 'required|unique:users|email:rfc|max:255',
            'password' => 'required|max:255',
            'roles' => 'required|array|min:1',
            'roles.*' => 'required|distinct|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $userCreated = $this->userRepository->save(
            $request->name,
            $request->first_surname,
            $request->second_surname,
            $request->birthday,
            $request->email,
            $request->password,
            $request->roles,
        );

        if ($userCreated == null)
            return response([
                "message" => "error"
            ])->header('Content-Type','application/json');

        $token = $userCreated->createToken('auth_token')->plainTextToken;

        return response([
            "userCreated" => $userCreated,
            "auth_token" => $token
        ])->header('Content-Type','application/json');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'You have successfully logged out and te token was successfully deleted'
        ];
    }
}
