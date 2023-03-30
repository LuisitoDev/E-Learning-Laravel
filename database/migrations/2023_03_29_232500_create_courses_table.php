<?php

use App\Models\Course;
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
        Schema::create(Course::table_name, function (Blueprint $table) {
            $table->bigIncrements(Course::Id_col);
            $table->string(Course::Title_col);
            $table->string(Course::Descrption_col);
            $table->decimal(Course::Cost_col);

            $table->bigInteger(Course::Creator_User_col)->unsigned();
            $table->foreign(Course::Creator_User_col)
                ->references(User::Id_col)->on(User::table_name)
                ->onDelete('cascade');

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
        Schema::dropIfExists(Course::table_name);
    }
};
