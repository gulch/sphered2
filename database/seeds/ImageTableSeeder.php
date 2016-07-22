<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ImageTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('Image')->insert([
            'id' => 1,
            'alt' => $faker->text(100),
            'path' => '/2016/07/blog-image-example.jpg',
            'created_at' => Carbon::now()
        ]);
    }
}
