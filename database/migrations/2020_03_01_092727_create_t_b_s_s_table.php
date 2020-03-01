<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBSSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbs', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');

            $table->string('start_date',255)->nullable();
            $table->string('end_date',255)->nullable();
            $table->text('job_number')->nullable();
            $table->text('job_title')->nullable();

            $table->char('start_status',32)->nullable();
            $table->text('start_justification')->nullable();

            $table->char('booking_progress',32)->nullable();
            $table->char('booking_justification',32)->nullable();

            $table->char('finish_status',32)->nullable();
            $table->text('finish_justification')->nullable();
            $table->text('img_update')->nullable();
            $table->text('img_path_update')->nullable();

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
        Schema::dropIfExists('tbs');
    }
}
