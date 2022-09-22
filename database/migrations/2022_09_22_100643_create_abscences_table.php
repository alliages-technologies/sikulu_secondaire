<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbscencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abscences', function (Blueprint $table) {
            $table->id();
            $table->integer('ecole_id')->default(0);
            $table->string('name',50)->nullable();
            $table->integer('annee_id')->default(0);
            $table->integer('salle_id')->default(0);
            $table->integer('inscription_id')->default(0);
            $table->date('jour')->nullable();
            $table->integer('user_id')->default(0);
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
        Schema::dropIfExists('abscences');
    }
}
