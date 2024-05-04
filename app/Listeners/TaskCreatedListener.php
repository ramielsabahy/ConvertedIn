<?php

namespace App\Listeners;

use App\Events\TaskCreatedEvent;
use App\Services\TaskService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public TaskService $taskService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskCreatedEvent $event): void
    {

    }
}
