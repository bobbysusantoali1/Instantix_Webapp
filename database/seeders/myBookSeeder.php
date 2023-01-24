<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class myBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            [
                "event_id" => 1,
                "category_name" => "Regular",
                "category_desc" => "This ticket will give you an access to the event",
                "category_init_stock" => 100,
                "category_curr_stock" => 28,
                "price" => 100000
            ],
        ]);
    }
}
