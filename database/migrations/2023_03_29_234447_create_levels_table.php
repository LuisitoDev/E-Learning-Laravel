<?php

use App\Models\Course;
use App\Models\Level;
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
        Schema::create(Level::table_name, function (Blueprint $table) {
            $table->bigIncrements(Level::Id_col);
            $table->string(Level::Title_col);
            $table->string(Level::Video_Path_col);
            $table->string(Level::PDF_Path_col);
            $table->string(Level::Content_col, 1000);
            $table->boolean(Level::Free_Trial_col);

            $table->bigInteger(Level::Owner_Course_col)->unsigned();
            $table->foreign(Level::Owner_Course_col)
                ->references(Course::Id_col)->on(Course::table_name)
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
        Schema::dropIfExists(Level::table_name);
    }
};
