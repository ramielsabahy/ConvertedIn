<?php

namespace App\Services;

use App\Models\Task;
use App\Events\TaskCreatedEvent;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function find(int $id): User
    {
        return User::find($id);
    }
}
