<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valeurattribue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribut_id')->constrained('attributes');
            $table->foreignId('variation_id')->constrained('variations');
            $table->string('valeur');
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
        Schema::dropIfExists('valeurattribue');
    }
};
