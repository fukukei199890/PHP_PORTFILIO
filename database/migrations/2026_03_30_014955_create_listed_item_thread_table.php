<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. 中間テーブル作成
        Schema::create('listed_item_thread', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listed_item_id')->constrained()->cascadeOnDelete();
            $table->foreignId('thread_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['listed_item_id', 'thread_id']);
        });

        // 2. データ移行（ここが重要！）
        // threadsテーブルにある既存の紐付けを救出します
        $threads = DB::table('threads')->whereNotNull('listed_item_id')->get();

        foreach ($threads as $thread) {
            // listed_item_idが存在する場合のみ中間テーブルに挿入
            // 存在チェック（listed_itemsテーブルにそのIDがあるか）を入れるとより安全です
            if (DB::table('listed_items')->where('id', $thread->listed_item_id)->exists()) {
                DB::table('listed_item_thread')->insert([
                    'listed_item_id' => $thread->listed_item_id,
                    'thread_id'      => $thread->id,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listed_item_thread');
    }
};
