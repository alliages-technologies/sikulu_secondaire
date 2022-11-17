<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_jours', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->text('detail')->nullable();
            $table->integer('user_id')->default(0);
            $table->integer('ecole_id')->default(0);
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
        Schema::dropIfExists('rapport_jours');
    }
}
