<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::table_name, function (Blueprint $table) {
            $table->bigIncrements(User::Id_col);
            $table->string(User::Name_col);
            $table->string(User::First_Surname_col);
            $table->string(User::Second_Surname_col)->nullable();
            $table->timestamp(User::Birthday_col);
            $table->string(User::Email_col)->unique();
            $table->string(User::Password_col);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(User::table_name);
    }
};
