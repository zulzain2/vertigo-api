<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMSSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tms', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');

            $table->text('client_name')->nullable();
            $table->text('vtsb_num')->nullable();
            $table->string('sitevisit_start_date',255)->nullable();
            $table->string('sitevisit_end_date',255)->nullable();
            $table->char('id_inquiry', 32)->nullable();

            $table->string('review_start_date',255)->nullable();
            $table->string('review_end_date',255)->nullable();

            $table->char('acknowledge_status', 32)->nullable();
            $table->char('acknowledge_by', 32)->nullable();

            $table->char('start_task', 32)->comment('0 : No , 1 : Yes')->nullable();
            $table->text('justification_start')->nullable();

            $table->char('finish_task', 32)->comment('0 : No , 1 : Yes')->nullable();
            $table->text('justification_finish')->nullable();

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
        Schema::dropIfExists('tms');
    }
}
