<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneEmploiTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_emploi_temps', function (Blueprint $table) {
            $table->id();
            $table->integer('ligne_programme_ecole_id')->default(0);
            $table->integer('tranche_id')->default(0);
            $table->integer('emploi_id')->default(0);
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
        Schema::dropIfExists('ligne_emploi_temps');
    }
}
