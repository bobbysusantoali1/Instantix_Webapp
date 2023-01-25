<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                "id" => "ticket_id_1",
                "event_id" => "event1",
                "category_name" => "Regular",
                "category_desc" => "This ticket grants you access to the event",
                "category_init_stock" => 100,
                "category_curr_stock" => 28,
                "price" => 150000
            ],
            [
                "id" => "ticket_id_2",
                "event_id" => "event1",
                "category_name" => "VIP",
                "category_desc" => "This ticket grants you access to the event & backstage",
                "category_init_stock" => 10,
                "category_curr_stock" => 2,
                "price" => 350000
            ],
            [
                "id" => "ticket_id_3",
                "event_id" => "event2",
                "category_name" => "Regular",
                "category_desc" => "This ticket grants you access to the concert",
                "category_init_stock" => 1000,
                "category_curr_stock" => 302,
                "price" => 250000
            ],
            [
                "id" => "ticket_id_4",
                "event_id" => "event2",
                "category_name" => "VIP",
                "category_desc" => "This ticket grants you full-day access to the concert & backstage",
                "category_init_stock" => 20,
                "category_curr_stock" => 0,
                "price" => 500000
            ]
        ]);
    }
}
