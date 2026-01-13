<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $song = new Song();
            $song->title = $faker->words(3, true);
            $song->description = $faker->paragraph();
            $song->album_id = $faker->numberBetween(8, 33);
            $song->save();
        }
    }
}
