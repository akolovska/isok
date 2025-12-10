<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = Category::all();
        foreach (range(1, 20) as $index) {
            Recipe::query()->create([
                'name' => $faker->name,
                'category' => $categories->random()->id,
                'description' => $faker->text(),
                'ingredients' => $faker->text()
            ]);
        }
    }
}
