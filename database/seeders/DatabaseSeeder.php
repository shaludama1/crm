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
                $this->call(shopTableSeeder::class);
                $this->call(planTableSeeder::class); 
                $this->call(clientTableSeeder::class);
                $this->call(plan_clientSeeder::class);
                $this->call(client_shopSeeder::class);

    }
}
