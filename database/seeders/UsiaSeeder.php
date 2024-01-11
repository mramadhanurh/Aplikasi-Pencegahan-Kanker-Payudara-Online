<?php

namespace Database\Seeders;

use App\Models\Usia;
use Illuminate\Database\Seeder;

class UsiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usia::create([
            'usia' => '<25',
            'skor' => '1',
        ]);

        Usia::create([
            'usia' => '26-39',
            'skor' => '2',
        ]);

        Usia::create([
            'usia' => '40-49',
            'skor' => '3',
        ]);

        Usia::create([
            'usia' => '50-70',
            'skor' => '4',
        ]);

        Usia::create([
            'usia' => '>70',
            'skor' => '3',
        ]);
    }
}
