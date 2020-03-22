<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnMss0312s3453453451 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mss', function (Blueprint $table) {
            
            $table->dropColumn('img_update');
            $table->dropColumn('img_path_update');

            
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
            
            $table->text('img_update')->nullable();
            $table->text('img_path_update')->nullable();

            
        });
        
    }
}
