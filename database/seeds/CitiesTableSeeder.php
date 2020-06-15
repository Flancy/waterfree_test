<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'Черкесск',
            'slug' => 'Cherkessk',
            'parent_id' => 0,
        ]);
        DB::table('cities')->insert([
            'name' => 'Ставрополь',
            'slug' => 'Stavropol',
            'parent_id' => 0,
        ]);

        /*
        DB::table('cities')->insert([
            'name' => 'Краснодар',
            'parent_id' => 0,
        ]);
        
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург',
            'parent_id' => 0,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Адмиралтейский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Бокситогорский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Василеостровский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Волосовский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Волховский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Всеволожский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Выборгский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Выборгский ЛО)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Гатчинский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Калининский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Кингисеппский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Киришский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Кировский ЛО)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Кировский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Колпинский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Красногвардейский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Красносельский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Кронштадтский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Курортный)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Лодейнопольский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Ломоносовский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Лужский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Московский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Невский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Петроградский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Петродворцовый)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Подпорожский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Приморский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Приозерский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Пушкинский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Сланцевский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Сосновоборский городской округ)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Тихвинский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Тосненский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Фрунзенский)',
            'parent_id' => 4,
        ]);
        DB::table('cities')->insert([
            'name' => 'Санкт-Петербург (Центральный)',
            'parent_id' => 4,
        ]);
        */
    }
}
