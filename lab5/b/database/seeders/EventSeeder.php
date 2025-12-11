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
        Event::factory(10)->create();
    }
}
