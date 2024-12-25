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
        Schema::create('variations_promotions', function (Blueprint $table) {
            $table->id();
  $table->foreignId('variation_id')->constrained('variations')->onDelete('cascade');
  $table->foreignId('promotion_id')->constrained('promotions')->onDelete('cascade');
  $table->unique(['variation_id', 'promotion_id']);
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
        Schema::dropIfExists('variations_promotions');
    }
};