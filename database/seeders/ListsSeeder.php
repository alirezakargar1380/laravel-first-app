<?php

namespace Database\Seeders;

use App\Models\Lists;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 3; $i++) {
            Lists::create([
                'name' => $faker->sentence,
                'author' => $faker->name,
                'test' => $faker->sentence
            ]);
        }
    }
}
