<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Vote;
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
        Schema::create(Vote::table_name, function (Blueprint $table) {
            $table->bigInteger(Vote::Voting_User_col)->unsigned();
            $table->foreign(Vote::Voting_User_col)
                ->references(User::Id_col)->on(User::table_name)
                ->onDelete('cascade');
            

            $table->bigInteger(Vote::Voted_Course_col)->unsigned();
            $table->foreign(Vote::Voted_Course_col)
                ->references(Course::Id_col)->on(Course::table_name)
                ->onDelete('cascade');

            $table->boolean(Vote::Value_col);
            $table->timestamps();
            $table->softDeletes();

            $table->primary([Vote::Voting_User_col, Vote::Voted_Course_col]);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Vote::table_name);
    }
};
