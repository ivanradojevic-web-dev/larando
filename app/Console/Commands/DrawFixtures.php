<?php

namespace App\Console\Commands;

use App\Models\Fixture;
use App\Models\Team;
use Illuminate\Console\Command;
use Tonystore\LaravelRoundRobin\Services\RoundRobin;

class DrawFixtures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'draw:fixtures';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Draw Fixtures';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $teams = Team::all()->pluck('slug')->toArray();

        $schedule = RoundRobin::addTeams($teams)->shuffle()->doubleRound()->schedule();

        $schedule->each(function ($items) {

            foreach ($items as $key => $item) {
                Fixture::create([
                    'round' => $item['round'],
                    'match_number' => $key + 1,
                    'team_id'=> Team::where('slug', $item['local'])->first()->id,
                ]);

                Fixture::create([
                    'round' => $item['round'],
                    'match_number' => $key + 1,
                    'team_id'=> Team::where('slug', $item['visitor'])->first()->id,
                ]);
            }
            
        });
    }
}
