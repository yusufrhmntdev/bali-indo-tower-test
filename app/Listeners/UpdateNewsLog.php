<?php

namespace App\Listeners;

use App\Events\NewsUpdated;
use App\Models\LogActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateNewsLog
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
    public function handle(NewsUpdated $event): void
    {
        //
        LogActivity::create([
            'description' => 'updated data ' . $event->news
       ]);
    }
}
