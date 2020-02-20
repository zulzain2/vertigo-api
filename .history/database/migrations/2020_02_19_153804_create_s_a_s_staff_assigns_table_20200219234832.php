<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSASStaffAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sas_staff_assigns', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');

            $table->char('id_user', 32)->nullable();
            $table->char('id_sas', 32)->nullable();
            $table->char('acknowledge_status', 32)->nullable();
            $table->char('start_task', 32)->nullable()->comment('my comment');
            $table->char('start_task', 32)->nullable();


            $table->char('status' , 32)->nullable();
            $table->char('created_by', 32)->nullable();
            $table->char('updated_by', 32)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sas_staff_assigns');
    }
}
