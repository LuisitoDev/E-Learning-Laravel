<?php 

namespace App\Models;

interface PurchaseFields {
    const table_name = "purchases";
    
    const Purchasing_User_col = "purchasing_user_id";
    const Purchased_Course_col = "purschased_course_id";
    const Progress_Course_col = "progress_course";
    const Payment_Method_col = "payment_method_id";
    const Payment_col = "payment";
    const Last_View_Date_col = "last_view_date";
    const Finished_Date_col = "finished_date";
}