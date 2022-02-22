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
                'status' => 1
            ],
            [
                'name' => 'Джентльмены',
                'status' => 1
            ],
            [
                'name' => 'Форрест Гамп',
                'status' => 0
            ],
            [
                'name' => 'Брюс Всемогущий',
                'status' => 1
            ],
            [
                'name' => 'Остров Проклятых',
                'status' => 1
            ],
            [
                'name' => 'Титаник',
                'status' => 1
            ],
        ]);
    }
}
