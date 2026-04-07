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
        Schema::table('listed_items', function (Blueprint $table) {
            // カラムの削除
            $table->dropColumn('image_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listed_items', function (Blueprint $table) {
            // ロールバック時にカラムを復元する
        // 元々の型（例: integer）を指定しておく必要がある
        $table->integer('image_url')->nullable();
        });
    }
};
