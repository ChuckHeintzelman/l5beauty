<?php

namespace App\Services;

use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SiteMap
{
    /**
     * Return the content of the Site Map
     */
    public function getSiteMap()
    {
        if (Cache::has('site-map')) {
            return Cache::get('site-map');
        }

        $siteMap = $this->buildSiteMap();
        Cache::add('site-map', $siteMap, 120);
        return $siteMap;
    }

    /**
     * Build the Site Map
     */
    protected function buildSiteMap()
    {
        $postsInfo = $this->getPostsInfo();
        $dates = array_values($postsInfo);
        sort($dates);
        $lastmod = last($dates);
        $url = trim(url(), '/') . '/';

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?'.'>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml[] = '  <url>';
        $xml[] = "    <loc>$url</loc>";
        $xml[] = "    <lastmod>$lastmod</lastmod>";
        $xml[] = '    <changefreq>daily</changefreq>';
        $xml[] = '    <priority>0.8</priority>';
        $xml[] = '  </url>';

        foreach ($postsInfo as $slug => $lastmod) {
            $xml[] = '  <url>';
            $xml[] = "    <loc>{$url}blog/$slug</loc>";
            $xml[] = "    <lastmod>$lastmod</lastmod>";
            $xml[] = "  </url>";
        }

        $xml[] = '</urlset>';

        return join("\n", $xml);
    }

    /**
     * Return all the posts as $url => $date
     */
    protected function getPostsInfo()
    {
        return Post::where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->lists('updated_at', 'slug')
            ->all();
    }
}
