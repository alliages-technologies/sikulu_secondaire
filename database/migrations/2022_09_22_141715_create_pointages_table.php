<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointages', function (Blueprint $table) {
            $table->id();
            $table->integer('ecole_id')->default(0);
            $table->integer('prof_id')->default(0);
            $table->integer('mois_id')->default(0);
            $table->integer('annee_id')->default(0);
            $table->date('jour')->nullable();
            $table->integer('nbr_heure')->default(1);
            $table->integer('ligne_programme_ecole_id')->default(0);
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('pointages');
    }
}
