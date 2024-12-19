<?php

return [
    'tmdb' => [
        'url' => env('TMDB_URL','https://api.themoviedb.org/3/'),
        'api_key' => env('TMDB_READ_ACCESS_TOKEN'),
        'image_base_url' => env('TMDB_IMAGE_BASE_URL', 'https://image.tmdb.org/t/p')
    ]
];