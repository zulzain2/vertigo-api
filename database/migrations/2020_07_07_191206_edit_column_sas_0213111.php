<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnSas0213111 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sas_staff_assigns', function (Blueprint $table) {
            
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sas_staff_assigns', function (Blueprint $table) {
            
            $table->string('start_date', 255)->nullable();
            $table->string('end_date', 255)->nullable();
        
   
        });
    }
}
