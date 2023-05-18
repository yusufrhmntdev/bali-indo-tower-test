<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use App\Models\LogActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewsLog
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewsCreated $event): void
    {
        //
        LogActivity::create([
             'description' => 'created data ' . $event->news
        ]);
    }
}
