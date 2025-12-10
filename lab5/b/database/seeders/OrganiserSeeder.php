<?php

namespace Database\Seeders;
use App\Models\Organiser;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Organiser::query()->create([
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber
            ]);
        }

    }
}
