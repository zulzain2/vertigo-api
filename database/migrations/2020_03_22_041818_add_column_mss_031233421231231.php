<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMss031233421231231 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mss', function (Blueprint $table) {
            
            $table->dropColumn('id_approver');
            $table->dropColumn('approval_status');

            
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
            
            $table->char('id_approver', 32)->nullable();
            $table->char('approval_status', 32)->nullable();

            
        });
    }
}
