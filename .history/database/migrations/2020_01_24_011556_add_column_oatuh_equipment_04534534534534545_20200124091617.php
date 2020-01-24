<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOatuhEquipment04534534534534545 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipment_categories', function (Blueprint $table) {
            $table->char('id', 32);
            $table->primary('id');
            $table->text('name')->nullable();
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
        //
    }
}
