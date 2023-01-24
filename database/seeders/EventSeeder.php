<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                "user_id" => 3,
                "event_name" => "Meet a NASA Engineer",
                "event_address" => "Tesla Building, Jalan Gangsa, Jakarta Barat, Indonesia",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "placeholder",
                "event_date" => Carbon::create('2023', '2', '20'),
                "event_start_time" => Carbon::createFromTime('16', '30', '00'),
                "event_end_time" => Carbon::createFromTime('19', '30', '00'),
            ],
            [
                "user_id" => 3,
                "event_name" => "NASA Band World Tour",
                "event_address" => "Jl. BSD Grand Boulevard No.1, Pagedangan, Kec. Pagedangan, Kabupaten Tangerang, Banten 15339",
                "event_artist" => "Elon Musk, Mark Rober",
                "event_image" => "placeholder",
                "event_date" => Carbon::create('2023', '3', '20'),
                "event_start_time" => Carbon::createFromTime('14', '30', '00'),
                "event_end_time" => Carbon::createFromTime('20', '30', '00'),
            ]
        ]);
    }
}
