<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnTms10213111 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tms', function (Blueprint $table) {
            
            $table->dateTime('sitevisit_start_date', 0)->nullable();
            $table->dateTime('sitevisit_end_date', 0)->nullable();
            $table->dateTime('review_start_date', 0)->nullable();
            $table->dateTime('review_end_date', 0)->nullable();



 
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tms', function (Blueprint $table) {
            
            $table->dropColumn('sitevisit_start_date');
            $table->dropColumn('sitevisit_end_date');
            $table->dropColumn('review_start_date');
            $table->dropColumn('review_end_date');
   
        });
    }
}
