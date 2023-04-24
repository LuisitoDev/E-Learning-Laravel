<?php

namespace App\Repositories\Role;

use App\Models\Role;
use Illuminate\Support\Facades\Log;

class RoleRepository{

    public function getAll()
    {
        return Role::query()->get();
    }

}