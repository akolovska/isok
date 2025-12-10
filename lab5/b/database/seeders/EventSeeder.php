<?php

namespace Database\Seeders;
use App\ENUM\Type;
use App\Http\Requests\EventStoreRequest;
use App\Models\Organiser;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organisers = Organiser::all();
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Event::query()->create([
                'name' => $faker->name,
                'description' => $faker->text(200),
                'date' => $faker->date(),
                'type' => Type::cases()[array_rand(Type::cases())]->value,
                'organiser' => $organisers->random()->id
            ]);
        }
    }
}
