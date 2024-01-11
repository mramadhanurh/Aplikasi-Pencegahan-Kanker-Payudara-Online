<?php

namespace Database\Seeders;

use App\Models\Riwayat;
use Illuminate\Database\Seeder;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Riwayat::create([
            'riwayat' => 'Tidak ada',
            'skor' => '1',
        ]);

        Riwayat::create([
            'riwayat' => 'Kerabat tingkat kedua (kakek-nenek-paman-bibi)',
            'skor' => '2',
        ]);

        Riwayat::create([
            'riwayat' => 'Kerabat tingkat pertama (orangtua atau saudara kandung)',
            'skor' => '3',
        ]);

        Riwayat::create([
            'riwayat' => 'Lebih dari satu kerabat tingkat satu',
            'skor' => '4',
        ]);
    }
}
