<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleveTraitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releve_traites', function (Blueprint $table) {
            $table->id();
            $table->integer('annee_id')->default(0);
            $table->integer('trimestre_id')->default(0);
            $table->integer('active')->default(1);
            $table->string('token',250)->nullable();
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
        Schema::dropIfExists('releve_traites');
    }
}
