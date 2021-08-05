<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = Faker::create('id_ID');

        for($i=1; $i <= 50; $i++){

            DB::table('pegawais')->insert([

                'name' => $faker->name,

                'birthday' => $faker->date,

                'email' => $faker->email,

                'job' => $faker->jobTitle,

                'address'    => $faker->address

            ]);

        }
    }
}
