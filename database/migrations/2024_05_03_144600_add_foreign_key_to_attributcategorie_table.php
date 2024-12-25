<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAttributcategorieTable extends Migration
{
    public function up()
    {
        Schema::table('attributcategorie', function (Blueprint $table) {
            $table->dropForeign('attributcategorie_attribut_id_foreign');
            $table->foreign('attribut_id')
                  ->references('id')->on('attributes')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('attributcategorie', function (Blueprint $table) {
            $table->dropForeign('attributcategorie_attribut_id_foreign');
            $table->foreign('attribut_id')
                  ->references('id')->on('attributes');
        });
    }
}
