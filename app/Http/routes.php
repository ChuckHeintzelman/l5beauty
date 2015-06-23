<?php

get('/', function () {
    return redirect('/blog');
});

get('blog', 'BlogController@index');
get('blog/{slug}', 'BlogController@showPost');
