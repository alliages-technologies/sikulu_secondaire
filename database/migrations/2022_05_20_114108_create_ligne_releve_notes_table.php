<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneReleveNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_releve_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('releve_id')->default(0);
            $table->integer('programme_ligne_ecole_id')->default(0);
            $table->integer('note_id')->default(0);
            $table->float('valeur')->default(0);
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
        Schema::dropIfExists('ligne_releve_notes');
    }
}
