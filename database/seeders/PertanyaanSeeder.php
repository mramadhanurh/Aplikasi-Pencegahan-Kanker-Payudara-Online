<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pertanyaan::create([
            'pertanyaan' => 'Ditemukan benjolan',
            'pilihan' => 'Ya',
            'skor' => '1',
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Ditemukan benjolan',
            'pilihan' => 'Tidak',
            'skor' => '0',
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Benjolan teraba',
            'pilihan' => 'Bergerak',
            'skor' => '2',
        ]);
        
        Pertanyaan::create([
            'pertanyaan' => 'Benjolan teraba',
            'pilihan' => 'Kenyal',
            'skor' => '2',
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Benjolan teraba',
            'pilihan' => 'Tidak bergerak',
            'skor' => '3',
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Benjolan teraba',
            'pilihan' => 'Keras',
            'skor' => '3',
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Puting Payudara',
            'pilihan' => 'Menonjol',
            'skor' => '0',
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Puting Payudara',
            'pilihan' => 'Masuk ke dalam',
            'skor' => '1',
        ]);
    }
}
