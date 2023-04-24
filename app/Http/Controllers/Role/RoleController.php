<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }
    
    public function getRoles()
    {
        $roles = $this->roleRepository->getAll();

        return response([
            "roles" => $roles
        ])->header('Content-Type','application/json');
    }
}
