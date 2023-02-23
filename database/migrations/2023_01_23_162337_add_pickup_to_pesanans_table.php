<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPickupToPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->enum('pickup', ['jasa_antar', 'ke_lokasi']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropColumn('pickup');
        });
    }
}
