<?php 

namespace App\Models;

interface LevelFields {
    const table_name = "levels";
    
    const Id_col = "id";
    const Title_col = "title";
    const Video_Path_col = "video_path";
    const PDF_Path_col = "pdf_path";
    const Content_col = "content";
    const Free_Trial_col = "free_trial";
    const Owner_Course_col = "owner_course_id";
}