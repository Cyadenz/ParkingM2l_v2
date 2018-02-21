<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('idplace');
            $table->integer('numplace')->unique();
            $table->boolean('reserver')->default(false);

            $table->integer('idUserReserve')->nullable();
        });

    DB::table('places')->insert([
    ['idplace' => 1, 'numplace' => 1, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 2, 'numplace' => 2, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 3, 'numplace' => 3, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 4, 'numplace' => 4, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 5, 'numplace' => 5, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 6, 'numplace' => 6, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 7, 'numplace' => 7, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 8, 'numplace' => 8, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 9, 'numplace' => 9, 'reserver' => 0, 'idUserReserve' => NULL],
    ['idplace' => 10, 'numplace' => 10, 'reserver' => 0, 'idUserReserve' => NULL]
    ]);
    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
