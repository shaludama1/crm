<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Client;

class clientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i<1000 ; $i++)
        {
            $client = new Client;
            $client->name = 'Client-'.($i+1);
            $client->budget = rand(1 , 10) * 1000000;
            $client->save();

        }
    }
}
