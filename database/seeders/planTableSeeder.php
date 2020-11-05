<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Plan;

class planTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i<500 ; $i++)
        {
            $plan = new Plan;
            $plan->shop_id = rand(1 , 200);
            $plan->name = 'Plan-'.($i+1);
            $plan->price = rand(1 , 10) * 10000;
            $plan->save();

        }
    }
}
