<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class plan_clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<701 ; $i++)
        {
            $client = rand(1 , 1000);
            $plan = rand(1 , 500);
            if(DB::table('client_plan')->where('client_id' , $client)->where('plan_id' , $plan)->exists())
            {
                //
            }
            else
            {
               DB::table('client_plan')->insert(
                [
                   'client_id' => $client, 
                   'plan_id' => $plan, 
                ]
                
              ); 
            }
            

        }
    }
}
