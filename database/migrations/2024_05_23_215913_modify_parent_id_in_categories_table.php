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
        Schema::table('categories', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['parent_id']);

            // Then drop the column
            $table->dropColumn('parent_id');
        });

        Schema::table('categories', function (Blueprint $table) {
            // Re-add the column with the cascade on delete constraint
            $table->unsignedBigInteger('parent_id')->nullable()->after('description');
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['parent_id']);

            // Then drop the column
            $table->dropColumn('parent_id');
        });

        Schema::table('categories', function (Blueprint $table) {
            // Re-add the column without the cascade on delete constraint
            $table->unsignedBigInteger('parent_id')->nullable()->after('description');
            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }
};
