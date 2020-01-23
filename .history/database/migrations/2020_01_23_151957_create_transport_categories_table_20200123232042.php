<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_categories', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->text('name')->nullable();
            $table->text('img')->nullable();
            $table->text('plate_number')->nullable();
            $table->text('description')->nullable();
            $table->char('id_trans_category' , 32)->nullable();
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
        Schema::dropIfExists('transport_categories');
    }
}
