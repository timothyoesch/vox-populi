<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;
use App\Models\Supporter;

class FixConfigurationMistake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'petition:fix-configuration-mistake';

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
        $activities = Activity::where("description", "=", "updated")->where("subject_type", "=", "App\\Models\\Supporter")->get();
        $mistakes = [];
        foreach ($activities as $activity) {
            if ($activity->properties["attributes"]["optin"] != $activity->properties["old"]["optin"]) {
                $mistakes[] = $activity->properties["attributes"]["email"];
            }
        }
        file_put_contents("mistakes.json", json_encode($mistakes));
    }
}
