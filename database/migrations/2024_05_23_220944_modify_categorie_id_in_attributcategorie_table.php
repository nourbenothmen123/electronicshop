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
            // Drop the foreign key constraint first
            $table->dropForeign(['categorie_id']);
            
            // Re-add the foreign key with the cascade on delete constraint
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
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
            // Drop the foreign key constraint first
            $table->dropForeign(['categorie_id']);
            
            // Re-add the original foreign key without the cascade on delete constraint
            $table->foreign('categorie_id')->references('id')->on('categories');
        });
    }
};
