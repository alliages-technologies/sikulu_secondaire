<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->bigInteger('ecole_id')->default(0);
            $table->bigInteger('categorie_id')->default(0);
            $table->string('token', 100)->nullable();
            $table->double('montant')->default(0);
            $table->text('description')->nullable();
            $table->bigInteger('user_id')->default(0);
            $table->integer('semaine')->default(0);
            $table->integer('mois')->default(0);
            $table->integer('annee')->default(0);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('entrees');
    }
}
