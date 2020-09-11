<?php

use Illuminate\Database\Seeder;

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('marketplaces')->insert([
            'id' => 1,
            'market_name' => 'Amazon',
        ]);

        DB::table('marketplaces')->insert([
            'id' => 2,
            'market_name' => 'eBay',
        ]);

        DB::table('marketplaces')->insert([
            'id' => 3,
            'market_name' => 'Jet',
        ]);

        DB::table('marketplaces')->insert([
            'id' => 4,
            'market_name' => 'Shopify',
        ]);

        DB::table('marketplaces')->insert([
            'id' => 5,
            'market_name' => 'Walmart',
        ]);

        DB::table('marketplaces')->insert([
            'id' => 6,
            'market_name' => 'Other',
        ]);
    }
}
