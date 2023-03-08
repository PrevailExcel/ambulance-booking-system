<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ambulance;
use App\Models\Hospital;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'test@example.com',
            'type' => 0 //admin
        ]);

        \App\Models\User::factory(10)->create();

        Hospital::create([
            'name' => 'Eldorado Specialist Hospital',
            'address' => '10 somewhere highway'
        ]);
        Hospital::create([
            'name' => 'Regina Caeli Hospital',
            'address' => "7 Nobody's avenue"
        ]);
        Hospital::create([
            'name' => 'Landmark Hospital & Maternity',
            'address' => 'Plot 29, Tinubu road'
        ]);


        \App\Models\User::factory()->create([
            'name' => 'Eldorado',
            'email' => 'eldorado@example.com',
            'type' => 2, // hospital
            'hospital_id' => 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'regina',
            'email' => 'regina@example.com',
            'type' => 2, // hospital
            'hospital_id' => 2
        ]);
        \App\Models\User::factory()->create([
            'name' => 'landmark',
            'email' => 'landmark@example.com',
            'type' => 2, // hospital
            'hospital_id' => 3
        ]);

        $arr = [0,5];
        for ($i = 0; $i < 12; $i++) {
            shuffle($arr);
            Ambulance::create([
                'name' => 'Ambulance ' . rand(30, 99) . 'X',
                'price' => rand(2, 7) . $arr[0] . '00',
                'email' => fake()->unique()->email(),
                'phone' => fake()->phoneNumber(),
                'hospital_id' => rand(1, 3),
                'image' => 'amb' . rand(1, 7) . '.jpg'
            ]);
        }
    }
}
