<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTms02234232342 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tms', function (Blueprint $table) {
            
            $table->text('clerk_verify_status')->nullable();
            $table->text('clerk_verify_by')->nullable();
            $table->text('manager_verify_by')->nullable();
            $table->text('manager_verify_status')->nullable();

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
            
            $table->dropColumn('clerk_verify_status');
            $table->dropColumn('clerk_verify_by');
            $table->dropColumn('manager_verify_by');
            $table->dropColumn('manager_verify_status');

        });
    }
}
