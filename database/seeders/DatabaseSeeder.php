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
        // ctrl + shift + 7 = comment line 2 line
        // ctrl + shift + a = block comment
        $this->call(AgencyTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(OperationTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        
        // $this->call(ClienteVueloTableSeeder::class);
        // $this->call(ClientePortadorTableSeeder::class);
        // $this->call(PortadorVueloTableSeeder::class);
    }
}
