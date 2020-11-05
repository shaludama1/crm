<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class client_shopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<801 ; $i++)
        {
            $client = rand(1 , 1000);
            $shop = rand(1 , 200);
            if(DB::table('client_shop')->where('client_id' , $client)->where('shop_id' , $shop)->exists())
            {
                //
            }
            else
            {
               DB::table('client_shop')->insert(
                [
                   'client_id' => $client, 
                   'shop_id' => $shop, 
                ]
                
              ); 
            }
            

        }
    }
}
