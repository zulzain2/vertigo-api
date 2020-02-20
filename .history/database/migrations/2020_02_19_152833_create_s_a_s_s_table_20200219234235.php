<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSASSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sas', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');

            $table->string('start_date' , 255)->nullable();
            $table->string('start_time' , 255)->nullable();
            $table->string('end_date' , 255)->nullable();
            $table->string('end_time' , 255)->nullable();
            $table->text('job_number')->nullable();
            $table->text('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->char('id', 32);

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
        Schema::dropIfExists('sas');
    }
}
