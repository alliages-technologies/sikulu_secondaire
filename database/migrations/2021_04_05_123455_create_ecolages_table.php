<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcolagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecolages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inscription_id')->default(0);
            $table->double('montant')->default(0);
            $table->bigInteger('moi_id')->default(0);
            $table->integer('semaine')->default(0);
            $table->integer('mois')->default(0);
            $table->integer('annee')->default(0);
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
        Schema::dropIfExists('ecolages');
    }
}
