<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneeAcadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annee_acads', function (Blueprint $table) {
            $table->id();
            $table->string('annee1')->nullable();
            $table->string('annee2')->nullable();
            $table->date('dtrentree')->nullable();
            $table->boolean('actif')->default(1);
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
        Schema::dropIfExists('annee_acads');
    }
}
