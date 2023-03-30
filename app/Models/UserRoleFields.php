<?php 

namespace App\Models;

interface UserRoleFields {
    const table_name = "user_role";
    
    const User_col = "user_id";
    const Role_col = "role_id";
}