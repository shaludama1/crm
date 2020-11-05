<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Shop;

class shopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i<201 ; $i++)
        {
            $shop = new Shop;
            $shop->name = 'Shop-'.($i+1);
            $shop->location = 'Kerman';
            $shop->save();

        }
    }
}
