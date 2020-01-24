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
        Schema::table('equipments', function (Blueprint $table) {
            $table->text('img_path')->after('column')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropColumn('img_path');
        });
    }
}
