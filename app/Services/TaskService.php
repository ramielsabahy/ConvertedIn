<?php

namespace App\Services;

use App\Models\Task;
use App\Events\TaskCreatedEvent;
use App\Models\User;

class TaskService
{
    public function store($data, UserService $userService)
    {
        $user = $userService->find($data['assigned_to_id']);
        event(new TaskCreatedEvent($user));
        return Task::create($data);
    }

    public function incrementUserTasks(User $user)
    {
        return $user->increment('tasks_count');
    }
}
