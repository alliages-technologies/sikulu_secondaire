<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleveNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releve_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('inscription_id')->default(0);
            $table->integer('trimestre_id')->default(0);
            $table->string('token')->nullable();
            $table->integer('moi_id')->default(0);
            $table->integer('semaine_id')->default(0);
            $table->integer('annee_id')->default(0);
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
        Schema::dropIfExists('releve_notes');
    }
}
