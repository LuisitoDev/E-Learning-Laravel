<?php 

namespace App\Models;

interface VoteFields { 
    const table_name = "votes";
    
    const Voting_User_col = "voting_user_id";
    const Voted_Course_col = "voted_course_id";
    const Value_col = "value";
}