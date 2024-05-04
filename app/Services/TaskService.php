<?php

namespace App\Services;

use App\Jobs\UpdateStatisticsTableJob;
use App\Models\Task;
use App\Events\TaskCreatedEvent;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService
{
    public function index(): LengthAwarePaginator
    {
        return Task::paginate(10);
    }

    public function store($data, UserService $userService)
    {
        $user = $userService->find($data['assigned_to_id']);
        UpdateStatisticsTableJob::dispatch($user);
        return Task::create($data);
    }
}
