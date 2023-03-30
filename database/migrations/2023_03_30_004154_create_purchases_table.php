<?php

use App\Models\Course;
use App\Models\PaymentMethod;
use App\Models\Purchase;
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
        Schema::create(Purchase::table_name, function (Blueprint $table) {
            $table->bigInteger(Purchase::Purchasing_User_col)->unsigned();
            $table->foreign(Purchase::Purchasing_User_col)
                ->references(User::Id_col)->on(User::table_name)
                ->onDelete('cascade');

            $table->bigInteger(Purchase::Purchased_Course_col)->unsigned();
            $table->foreign(Purchase::Purchased_Course_col)
                ->references(Course::Id_col)->on(Course::table_name)
                ->onDelete('cascade');

            $table->float(Purchase::Progress_Course_col);
            
            $table->bigInteger(Purchase::Payment_Method_col)->unsigned();
            $table->foreign(Purchase::Payment_Method_col)
                ->references(PaymentMethod::Id_col)->on(PaymentMethod::table_name)
                ->onDelete('cascade');

            $table->float(Purchase::Payment_col);

            $table->timestamp(Purchase::Last_View_Date_col);
            $table->timestamp(Purchase::Finished_Date_col);
            
            $table->timestamps();
            $table->softDeletes();

            $table->primary([Purchase::Purchasing_User_col, Purchase::Purchased_Course_col]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Purchase::table_name);
    }
};
