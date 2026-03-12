<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListedItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listed_items')->insert([
            [
                'user_id'=>13,
                'char_name'=>'しーだーのてすと',
                'exchange_area'=>'miyazaki_station',
                'is_trading'=>0
            ]
        ]);
    }
}
