<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
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
            [
                "event_id" => 1,
                "category_name" => "VIP",
                "category_desc" => "This ticket will give you a full-day access to the event",
                "category_init_stock" => 10,
                "category_curr_stock" => 2,
                "price" => 300000
            ],
            [
                "event_id" => 1,
                "category_name" => "VVIP",
                "category_desc" => "This ticket will give you a full-day access to the event and an exclusive backstage access",
                "category_init_stock" => 3,
                "category_curr_stock" => 0,
                "price" => 1000000
            ],
            [
                "event_id" => 2,
                "category_name" => "Standing Section",
                "category_desc" => "This ticket will give you an access to the concert on the standing section",
                "category_init_stock" => 1000,
                "category_curr_stock" => 203,
                "price" => 250000
            ],
        ]);
    }
}
