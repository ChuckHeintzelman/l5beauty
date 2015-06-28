<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Seed the posts table
     */
    public function run()
    {
        // Pull all the tag names from the file
        $tags = Tag::lists('tag')->all();

        Post::truncate();

        // Don't forget to truncate the pivot table
        DB::table('post_tag_pivot')->truncate();

        factory(Post::class, 20)->create()->each(function ($post) use ($tags) {

            // 30% of the time don't assign a tag
            if (mt_rand(1, 100) <= 30) {
                return;
            }

            shuffle($tags);
            $postTags = [$tags[0]];

            // 30$ of the time we're assigning tags, assign 2
            if (mt_rand(1, 100) <= 30) {
                $postTags[] = $tags[1];
            }

            $post->syncTags($postTags);
        });
    }
}
