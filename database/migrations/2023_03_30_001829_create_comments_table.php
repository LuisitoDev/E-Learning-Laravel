<?php

use App\Models\Comment;
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
        Schema::create(Comment::table_name, function (Blueprint $table) {
            $table->bigIncrements(Comment::Id_col);

            $table->bigInteger(Comment::Commenting_User_col)->unsigned();
            $table->foreign(Comment::Commenting_User_col)
                ->references(User::Id_col)->on(User::table_name)
                ->onDelete('cascade');


            $table->bigInteger(Comment::Commented_Course_col)->unsigned();
            $table->foreign(Comment::Commented_Course_col)
                ->references(Course::Id_col)->on(Course::table_name)
                ->onDelete('cascade');

            $table->string(Comment::Description_col, 1000);

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
        Schema::dropIfExists(Comment::table_name);
    }
};
