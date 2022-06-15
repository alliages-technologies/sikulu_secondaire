<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviPaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivi_paiements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paiement_id')->default(0);
            $table->bigInteger('ecole_id')->default(0);
            $table->integer('semaine')->default(0);
            $table->integer('mois')->default(0);
            $table->integer('annee')->default(0);
            $table->string('token', 100)->nullable();
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
        Schema::dropIfExists('suivi_paiements');
    }
}
