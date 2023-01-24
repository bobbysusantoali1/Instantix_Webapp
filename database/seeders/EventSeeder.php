<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                "id" => "event1",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer!",
                "event_address" => "Letjen S. Parman St No.kav.28, South Tanjung Duren, Grogol petamburan, West Jakarta City, Jakarta 11470",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event2",
                "user_id" => "elon",
                "event_name" => "Elon & Mark Special Concert",
                "event_address" => "Jl. BSD Grand Boulevard No.1, Pagedangan, Kec. Pagedangan, Kabupaten Tangerang, Banten 15339",
                "event_artist" => "Elon Musk, Mark Rober",
                "event_image" => "ice_bsd.jpeg",
                "event_date" => Carbon::create('2023', '2', '2'),
                "event_start_time" => Carbon::createFromTime('14', '30', '0'),
                "event_end_time" => Carbon::createFromTime('19', '30', '0'),
            ]
        ]);
    }
}
