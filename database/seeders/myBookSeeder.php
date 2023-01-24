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
        DB::table('myBooks')->insert([
            [
                "user_id" => 1,
                "ticket_id" => 1,
                "quantity" => 1
            ],
            [
                "user_id" => 2,
                "ticket_id" => 2,
                "quantity" => 2
            ]
        ]);
    }
}
