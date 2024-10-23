<?php

namespace App\Console\Commands\Petition;

use Illuminate\Console\Command;
use function Laravel\Prompts\select;


class IssueApiToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'petition:issue-api-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = select('Select a user', \App\Models\User::all()->pluck('name', 'id')->toArray());
        $user = \App\Models\User::find($user);
        $token = $user->createToken('api-token');
        dd($token->plainTextToken);
    }
}
