<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_logs', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->text('user_type')->nullable();
            $table->char('id_user' , 32)->nullable();
            $table->string('start_at' , 255)->nullable();
            $table->string('end_at' , 255)->nullable();
            $table->string('document_type' , 255)->nullable();
            $table->char('id_document' , 64)->nullable();
            $table->text('remark')->nullable();
            $table->char('id_notification' , 64)->nullable();
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
        Schema::dropIfExists('document_logs');
    }
}
