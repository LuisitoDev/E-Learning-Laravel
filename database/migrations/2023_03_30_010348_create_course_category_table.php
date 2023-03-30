<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseCategory;
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
        Schema::create(CourseCategory::table_name, function (Blueprint $table) {
            $table->bigInteger(CourseCategory::Course_col)->unsigned();
            $table->foreign(CourseCategory::Course_col)
                ->references(Course::Id_col)->on(Course::table_name)
                ->onDelete('cascade');

            $table->bigInteger(CourseCategory::Category_col)->unsigned();
            $table->foreign(CourseCategory::Category_col)
                ->references(Category::Id_col)->on(Category::table_name)
                ->onDelete('cascade');

            $table->primary([CourseCategory::Course_col, CourseCategory::Category_col]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CourseCategory::table_name);
    }
};
