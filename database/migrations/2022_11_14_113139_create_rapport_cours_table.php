<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_cours', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->text('detail')->nullable();
            $table->integer('prof_id')->default(0);
            $table->integer('appuie_id')->default(0);
            $table->integer('programme_ecole_ligne_id')->default(0);
            $table->integer('ecole_id')->default(0);
            $table->integer('salle_id')->default(0);
            $table->integer('tranche_id')->default(0);
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
        Schema::dropIfExists('rapport_cours');
    }
}
