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
            'hit' => NULL,
            'city_id' => '1',
            'firm_id' => '1'
        ]);
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 2',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '19',
            'hit' => NULL,
            'city_id' => '1',
            'firm_id' => '1'
        ]);
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 3',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '5',
            'hit' => NULL,
            'city_id' => '1',
            'firm_id' => '1'
        ]);
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 4',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '5',
            'hit' => NULL,
            'city_id' => '1',
            'firm_id' => '1'
        ]);
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 5',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '19',
            'hit' => NULL,
            'city_id' => '1',
            'firm_id' => '1'
        ]);
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 6',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '19',
            'hit' => NULL,
            'city_id' => '2',
            'firm_id' => '1'
        ]);
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 7',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '5',
            'hit' => NULL,
            'city_id' => '2',
            'firm_id' => '1'
        ]);
        DB::table('products')->insert([
            'name' => 'Элит-Аквa 8',
            'slug' => 'elit-akva',
            'description' => 'Описание',
            'logo' => '/images/product_default.png',
            'price' => '190',
            'liter' => '5',
            'hit' => NULL,
            'city_id' => '2',
            'firm_id' => '1'
        ]);
    }
}
