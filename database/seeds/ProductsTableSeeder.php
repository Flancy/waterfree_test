<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 1',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '19',
            'comment' => NULL,
            'hit' => NULL,
            'city_id' => '1',
            'firm_id' => '1'
        ]);
    }
}
