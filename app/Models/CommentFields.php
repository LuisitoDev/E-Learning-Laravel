<?php 

namespace App\Models;

interface CommentFields {
    const table_name = "comments";
    
    const Id_col = "id";
    const Commenting_User_col = "commenting_user_id";
    const Commented_Course_col = "commented_course_id";
    const Description_col = "description";
}