<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            [
                'name' => 'Побег из Шоушенка',
                'status' => 1,
                'poster_link' => '/images/62151c7e1fb5c.jpg'
            ],
            [
                'name' => 'Джентльмены',
                'status' => 1,
                'poster_link' => '/images/62151f691e3d6.jpg'
            ],
            [
                'name' => 'Форрест Гамп',
                'status' => 0,
                'poster_link' => '/images/62152bc95be31.jpg'
            ],
            [
                'name' => 'Брюс Всемогущий',
                'status' => 1,
                'poster_link' => '/images/62152fbcec3e6.jpg'
            ],
            [
                'name' => 'Остров Проклятых',
                'status' => 1,
                'poster_link' => '/images/default_poster.jpg'
            ],
            [
                'name' => 'Титаник',
                'status' => 1,
                'poster_link' => '/images/default_poster.jpg'
            ],
        ]);
    }
}
