<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag', 'title', 'subtitle'];

    /**
     * The many-to-many relationship between tags and posts.
     *
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tag_pivot');
    }

    /**
     * Add any tags needed from the list
     *
     * @param array $tags List of tags to check/add
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }

        $found = static::whereIn('tag', $tags)->lists('tag');

        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'subtitle' => 'Subtitle for '.$tag,
            ]);
        }
    }

    /**
     * Return the index layout to use for a tag
     *
     * @param string $tag
     * @param string $default
     * @return string
     */
    public static function layout($tag, $default = 'blog.layouts.index')
    {
        $layout = static::whereTag($tag)->pluck('layout');

        return $layout ?: $default;
    }
}
