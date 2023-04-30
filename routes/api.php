<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Enums\RoleEnum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::post('/register', 'register')->middleware("transaction");
    Route::post('/login', 'login');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});


Route::controller(RoleController::class)->prefix('role')->group(function () {
    Route::middleware('auth:sanctum')->get('/', 'getRoles');
});

Route::controller(CourseController::class)->prefix('course')->group(function () {
    Route::middleware('auth:sanctum')->post('/', 'addCourse')->middleware('role:'.RoleEnum::SCHOOL)->middleware("transaction");
});

Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('/', 'getCategories');
    Route::middleware('auth:sanctum')->post('/', 'addCategory')->middleware('role:'.RoleEnum::SCHOOL)->middleware("transaction");
    Route::middleware('auth:sanctum')->put('/', 'updateCategory')->middleware('role:'.RoleEnum::SCHOOL)->middleware("transaction");
    Route::middleware('auth:sanctum')->delete('/', 'deleteCategory')->middleware('role:'.RoleEnum::SCHOOL)->middleware("transaction");
});

