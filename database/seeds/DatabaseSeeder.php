<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('PostTableSeeder');
    }

}

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        \App\Post::truncate();
        for ($i = 0; $i < 20; $i++) {
            $blog = new \App\Post();
            $blog->title = $faker->sentence(mt_rand(3, 10));
            $blog->content = join("\n\n", $faker->paragraphs(mt_rand(3, 6)));
            $blog->published_at = $faker->dateTimeBetween('-1 month', '+3 days');
            $blog->save();
        }
    }
}