<?php

use App\Models\Category;
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
        Schema::create(Category::table_name, function (Blueprint $table) {
            $table->bigIncrements(Category::Id_col);
            $table->string(Category::Title_col);
            $table->string(Category::Description_col);
            
            $table->bigInteger(Category::Creator_User_col)->unsigned();
            $table->foreign(Category::Creator_User_col)
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
        Schema::dropIfExists(Category::table_name);
    }
};
