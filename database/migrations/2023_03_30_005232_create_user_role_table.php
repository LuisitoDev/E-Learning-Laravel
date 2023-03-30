<?php

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
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
        Schema::create(UserRole::table_name, function (Blueprint $table) {
            $table->bigInteger(UserRole::User_col)->unsigned();
            $table->foreign(UserRole::User_col)
                ->references(User::Id_col)->on(User::table_name)
                ->onDelete('cascade');

            $table->bigInteger(UserRole::Role_col)->unsigned();
            $table->foreign(UserRole::Role_col)
                ->references(Role::Id_col)->on(Role::table_name)
                ->onDelete('cascade');

            $table->primary([UserRole::User_col, UserRole::Role_col]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UserRole::table_name);
    }
};
