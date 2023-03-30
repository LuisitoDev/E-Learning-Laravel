<?php 

namespace App\Models;

interface CourseFields {
    const table_name = "courses";
    
    const Id_col = "id";
    const Title_col = "title";
    const Descrption_col = "description";
    const Cost_col = "cost";
    const Creator_User_col = "creator_user_id";
}