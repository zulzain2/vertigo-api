<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsers03243342342 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('id_role' , 32)->nullable();
            $table->char('id_position' , 32)->nullable();
            $table->char('id_department' , 32)->nullable();
            $table->integer('status')->nullable();
            $table->char('contact' , 64)->nullable();
            $table->char('dob' , 32)->nullable();
            $table->char('id_access_role' , 32)->nullable();
            $table->char('id_access_position' , 32)->nullable();
            $table->char('id_' , 32)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
