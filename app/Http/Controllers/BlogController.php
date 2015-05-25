<?php
namespace App\Http\Controllers;

use App\Commands\BlogIndexData;
use App\Http\Requests;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Request;

class BlogController extends Controller
{
    public function index()
    {
        $tag = Request::get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';

        return view($layout, $data);
    }

    public function showPost($slug)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = Request::get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag'));
    }
}
