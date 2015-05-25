<?php

use App\Post;
use App\Tag;
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

        $this->call('TagTableSeeder');
        $this->call('PostTableSeeder');
    }
}

class TagTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        Tag::truncate();
        DB::table('post_tag_pivot')->truncate();
        for ($i = 0; $i < 5; $i++) {
            $tag = new Tag;
            $tag->tag = $faker->words(1)[0];
            $tag->title = ucfirst($tag->tag);
            $tag->subtitle = $faker->sentence(mt_rand(10, 30));
            $tag->save();
        }
    }
}

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        $tags = Tag::lists('tag');

        Post::truncate();
        for ($i = 0; $i < 20; $i++) {
            $post = new Post();
            $post->title = $faker->sentence(mt_rand(3, 10));
            $post->subtitle = $faker->sentence(mt_rand(10, 30));
            $post->content_raw = join("\n\n", $faker->paragraphs(mt_rand(3, 10)));
            $post->published_at = $faker->dateTimeBetween('-1 month', '+3 days');
            $post->save();

            if (mt_rand(1, 100) < 50) {
                shuffle($tags);
                $postTags = [$tags[0]];
                if (mt_rand(1, 100) < 50) {
                    $postTags[] = $tags[1];
                }
                $post->syncTags($postTags);
            }
        }
    }
}
