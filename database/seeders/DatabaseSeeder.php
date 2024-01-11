<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            UsiaSeeder::class,
            RiwayatSeeder::class,
            KategoriSeeder::class,
            PertanyaanSeeder::class,
        ]);
    }
}
