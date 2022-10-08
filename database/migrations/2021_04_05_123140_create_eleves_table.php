<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('nom',200)->nullable();
            $table->string('prenom',200)->nullable();
            $table->date('date_naiss')->nullable();
            $table->string('lieu_naiss',200)->nullable();
            $table->string('adresse',100)->nullable();
            $table->string('nom_pere',200)->nullable();
            $table->string('tel_pere',50)->nullable();
            $table->string('nom_mere',200)->nullable();
            $table->string('tel_mere',50)->nullable();
            $table->string('nom_tuteur',200)->nullable();
            $table->string('tel_tuteur',50)->nullable();
            $table->string('image_uri')->default('aucune image');
            $table->integer('sexe_id')->default(0);
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
        Schema::dropIfExists('eleves');
    }
}
