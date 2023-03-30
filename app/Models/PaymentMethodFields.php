<?php

namespace App\Models;

interface PaymentMethodFields {
    const table_name = "payment_methods";
    
    const Id_col = "id";
    const Method_col = "method";
}