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
        Schema::table('attributcategorie', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attributcategorie', function (Blueprint $table) {
            $table->dropForeign(['categorie_id']);
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
};
