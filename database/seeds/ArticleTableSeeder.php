<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            DB::table('Article')->insert([
                'slug' => $faker->slug(50),
                'title' => $faker->text(100),
                'content' => $faker->text(1000),
                'id__Image' => 1,
                'seo_title' => $faker->text(70),
                'seo_description' => $faker->text(255),
                'seo_keywords' => str_replace(' ', ', ', strtolower($faker->text(100))),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
