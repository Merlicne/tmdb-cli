<?php

namespace App;

class TmdbService
{
    private TmdbClient $client;

    public function __construct(TmdbClient $client)
    {
        $this->client = $client;
    }

    public function getPopularMovies()
    {
        return $this->client->get('/movie/popular');
    }

    public function getTopRatedMovies()
    {
        return $this->client->get('/movie/top_rated');
    }
}
