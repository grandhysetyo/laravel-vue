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
        // DatabaseSeeder ini digunakan untuk menjalakan beberapa class seeder yang ada
        $this->call([
            UserSeeder::class            
        ]);
        // cara run nya dengan menggunakan >php artisan db:seed
        // $this->call([
        //     UserSeeder::class,
        //     classSeeder2::class
        // ]);
    }
}
