<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'kategori' => 'Risiko Rendah',
        ]);

        Kategori::create([
            'kategori' => 'Risiko Sedang',
        ]);

        Kategori::create([
            'kategori' => 'Risiko Tinggi',
        ]);
    }
}
