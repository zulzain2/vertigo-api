<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnSas10213111 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sas_staff_assigns', function (Blueprint $table) {
            

            $table->dateTime('start_date',0)->nullable();
            $table->dateTime('end_date',0)->nullable();
        
   
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
            
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        
   
        });
    }
}
