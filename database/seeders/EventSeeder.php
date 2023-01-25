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
                "event_name" => "Meet a NASA Engineer! (1)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event2",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (2)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event3",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (3)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event4",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (4)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event5",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (5)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event6",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (6)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event7",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (7)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event8",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (8)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event9",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (9)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event10",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (10)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event11",
                "user_id" => "elon",
                "event_name" => "Meet a NASA Engineer! (11)",
                "event_desc" => "Meet Geoffrey A. Landis, one of the top NASA engineer, and have a discussion of your life about space!",
                "event_location" => "Central Park Mall, Jakarta",
                "event_artist" => "Geoffrey A. Landis",
                "event_image" => "images/central_park.jpg",
                "event_date" => Carbon::create('2023', '2', '1'),
                "event_start_time" => Carbon::createFromTime('16', '30', '0'),
                "event_end_time" => Carbon::createFromTime('18', '30', '0'),
            ],
            [
                "id" => "event12",
                "user_id" => "elon",
                "event_name" => "Elon & Mark Special Concert",
                "event_desc" => "Enjoy Elon Musk & Mark Rober holding a special concert with 10+ famous bands from the US!",
                "event_location" => "ICE BSD",
                "event_artist" => "Elon Musk, Mark Rober",
                "event_image" => "images/ice_bsd.jpeg",
                "event_date" => Carbon::create('2023', '2', '2'),
                "event_start_time" => Carbon::createFromTime('14', '30', '0'),
                "event_end_time" => Carbon::createFromTime('19', '30', '0'),
            ]
        ]);
    }
}
