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
        Schema::table('trade_requests', function (Blueprint $table) {
            //追加するカラム
            $table->string('request_series')->after('user_id');
            $table->string('request_char')->after('request_series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trade_requests', function (Blueprint $table) {
            //
            $table->dropColumn('request_series');
            $table->dropColumn('request_char');
        });
    }
};
