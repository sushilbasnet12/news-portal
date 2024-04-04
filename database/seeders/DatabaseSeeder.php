<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $key => $value) {
            DB::table('blogs')->insert([
                'title' => $faker->text(),
                'slug' => $faker->slug(),
                'keywords' => $faker->text(),
                'description' => $faker->text(),
                'content' => $faker->paragraph(),
            ]);
        }
    }
}
