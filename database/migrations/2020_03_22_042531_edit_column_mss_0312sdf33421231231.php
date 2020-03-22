<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnMss0312sdf33421231231 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mss', function (Blueprint $table) {
            
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        

Schema::table('mss', function (Blueprint $table) {
            
    $table->string('start_time' , 255)->nullable();
$table->string('end_time' , 255)->nullable();

    
});
    }
}
