<?php

use Illuminate\Database\Seeder;

class ArticleToTagTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('Article_Tag')->insert([
                'id__Article' => random_int(1, 10),
                'id__Tag' => random_int(1, 5),
            ]);
        }
    }
}
