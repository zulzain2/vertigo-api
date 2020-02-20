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

            $table->string('start_date' , 255)->nullable();
            $table->string('start_time' , 255)->nullable();
            $table->string('end_date' , 255)->nullable();
            $table->string('end_time' , 255)->nullable();

            $table->char('id_user', 32)->nullable();
            $table->char('id_sas', 32)->nullable();
            $table->char('acknowledge_status', 32)->nullable();
            $table->char('start_task', 32)->comment('0 : No , 1 : Yes')->nullable();
            $table->char('justification_satrt', 32)->nullable();

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
