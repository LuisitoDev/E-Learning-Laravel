<?php 

namespace App\Models;

interface CategoryFields { 
    const table_name = "categories";
    
    const Id_col = "id";
    const Title_col = "title";
    const Description_col = "description";
    const Creator_User_col = "creator_user_id";
}