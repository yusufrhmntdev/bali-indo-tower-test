<?php

namespace App\Listeners;

use App\Events\NewsDeleted;
use App\Models\LogActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteNewsLog
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
    public function handle(NewsDeleted $event): void
    {
        //
        LogActivity::create([
            'description' => 'deleted data ' . $event->news
       ]);
    }
}
