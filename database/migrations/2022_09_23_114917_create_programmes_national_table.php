<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammesNationalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes_national', function (Blueprint $table) {
            $table->id();
            $table->integer('classe_id')->default(0);
            $table->integer('active')->default(0);
            $table->integer('enseignement_id')->default(0);
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
        Schema::dropIfExists('programmes_national');
    }
}
