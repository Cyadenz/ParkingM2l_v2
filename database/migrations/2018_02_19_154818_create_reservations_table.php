<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->date('debutperiode')->foreign('debutperiode')->references('debutperiode')->on('periode');
            $table->date('finperiode');
            $table->integer('id_users')->unsigned()->foreign('id_users')->references('id')->on('users');
            $table->integer('id_place')->unsigned()->foreign('id_place')->references('idplace')->on('places');
            $table->primary(array('id_users', 'id_place', 'debutperiode'));
            $table->boolean('valider')->default(0);

            $table->rememberToken();
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
        Schema::dropIfExists('reservations');
    }
}
