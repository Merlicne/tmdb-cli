<?php

namespace App\Commands;

use App\TmdbService;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

use function Termwind\render;

class TopRatedMovies extends Command
{
    private TmdbService $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        parent::__construct();
        $this->tmdbService = $tmdbService;
    }


    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'top-rated-movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a list of movies ordered by rating.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $movies = $this->tmdbService->getTopRatedMovies();
        render('<div class="font-bold">Popular Movies</div>');
        $counter = 1;
        foreach ($movies->results as $movie) {
            render('<div class="mt-1"><span class="font-bold">' . $counter . '. ' . $movie->title . '</span></div>');
            render('<div class="ml-2">Overview: ' . $movie->overview . '</div>');
            $counter++;
        }
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
