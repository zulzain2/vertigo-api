<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMss0312334234234 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mss', function (Blueprint $table) {
            $table->string('start_date' , 255)->nullable();
            $table->string('start_time' , 255)->nullable();
            $table->string('end_date' , 255)->nullable();
            $table->string('end_time' , 255)->nullable();
            $table->char('id_approver', 32)->nullable();
            $table->char('approval_status', 32)->nullable();

            $table->char('acknowledge_status', 32)->nullable();
            $table->char('acknowledge_by', 32)->nullable();
            
            $table->char('start_task', 32)->comment('0 : No , 1 : Yes')->nullable();
            $table->text('justification_start')->nullable();

            $table->string('task_progress' , 255)->comment('Early Completion , Cancellation , Resistance')->nullable();
            $table->text('justification_update')->nullable();
            $table->text('img_update')->nullable();
            $table->text('img_path_update')->nullable();

            $table->char('finish_task', 32)->comment('0 : No , 1 : Yes')->nullable();
            $table->text('justification_finish')->nullable();
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
            $table->dropColumn('start_date');
            $table->dropColumn('start_time');
            $table->dropColumn('end_date');
            $table->dropColumn('end_time');
            $table->dropColumn('id_approver');
            $table->dropColumn('approval_status');

            $table->dropColumn('acknowledge_status');
            $table->dropColumn('acknowledge_by');
            
            $table->dropColumn('start_task');
            $table->dropColumn('justification_start');

            $table->dropColumn('task_progress');
            $table->dropColumn('justification_update');
            $table->dropColumn('img_update');
            $table->dropColumn('img_path_update');

            $table->dropColumn('finish_task');
            $table->dropColumn('justification_finish');
        });
    }
}
