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
            //
            $table->string('request_message')->nullable()->after('exchange_area');
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
            //
            $table->dropColumn('request_message');
        });
    }
};
