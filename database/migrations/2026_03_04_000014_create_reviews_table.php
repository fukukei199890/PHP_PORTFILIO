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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviewed_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reviewing_user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('score');
            $table->text('review_text');
            $table->unique(['reviewed_user_id', 'reviewing_user_id']);
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
        Schema::dropIfExists('reviews');
    }
};
