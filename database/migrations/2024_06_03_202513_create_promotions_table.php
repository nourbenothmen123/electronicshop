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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name_promo');
            $table->string('type_promo'); // Peut être 'categorie', 'variation' ou 'produit'
            $table->integer('pourcentage_promo')->nullable(); // Champ pourcentage avec 5 chiffres au total et 2 décimales
            $table->date('date_deb_promo')->nullable();
            $table->date('date_fin_promo')->nullable();
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
        Schema::dropIfExists('promotions');
    }
};