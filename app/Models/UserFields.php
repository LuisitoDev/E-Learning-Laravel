<?php 

namespace App\Models;

interface UserFields {
    const table_name = "users";
    
    const Id_col = "id";
    const Name_col = "name";
    const First_Surname_col = "first_surname";
    const Second_Surname_col = "second_surname";
    const Birthday_col = "birthday";
    const Email_col = "email";
    const Password_col = "password";
}