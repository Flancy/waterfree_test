<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firms')->insert([
            'name' => 'Элит-Akva',
            'slug' => 'elit-akva',
            'logo' => '/images/firm_default.svg'
        ]);
        DB::table('firms')->insert([
            'name' => 'Нарсана',
            'slug' => 'narsana',
            'logo' => '/images/firm_default.svg'
        ]);
        DB::table('firms')->insert([
            'name' => 'Аквалин',
            'slug' => 'akvalin',
            'logo' => '/images/firm_default.svg'
        ]);

        DB::table('city_firms')->insert([
            'city_id' => 1,
            'firms_id' => 1,
        ]);
        DB::table('city_firms')->insert([
            'city_id' => 1,
            'firms_id' => 2,
        ]);
        DB::table('city_firms')->insert([
            'city_id' => 1,
            'firms_id' => 3,
        ]);
    }
}
