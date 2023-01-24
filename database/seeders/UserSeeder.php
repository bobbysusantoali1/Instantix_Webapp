<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Dotenv\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dummy data dulu
        DB::table('users')->insert([
            [
                // "id" => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "id" => "rio",
                "email" => "riopramana@gmail.com",
                "password" => Hash::make("Pass123"),
                "full_name" => "Rio Pramana",
                "address" => "Jalan Kesuksesan Gang Abadi Nomor 12",
                "gender" => "Male",
                "dob" => Carbon::create('2002', '6', '23'),
                "role" => "customer",
                "phone_number" => "087838208402"
            ],
            [
                // "id" => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "id" => "elsa",
                "email" => "elsaangela@gmail.com",
                "password" => Hash::make("Pass123"),
                "full_name" => "Elsa Angela",
                "address" => "Jalan Jakarta Gang Indonesia Nomor 1",
                "gender" => "Female",
                "dob" => Carbon::create('2002', '5', '19'),
                "role" => "customer",
                "phone_number" => "099938208143"
            ],
            [
                // "id" => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "id" => "elon",
                "email" => "elonmuskcorp@gmail.com",
                "password" => Hash::make("Pass123"),
                "full_name" => "Elon Musk Corporation",
                "address" => "Mars Street Number X9283",
                "gender" => "Male",
                "dob" => Carbon::create('1971', '6', '28'),
                "role" => "eventOrganizer",
                "phone_number" => "718833"
            ]
        ]);
    }
}
