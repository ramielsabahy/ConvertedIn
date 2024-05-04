<?php

namespace App\Services;

use App\Models\Statistics;
use App\Models\Task;
use App\Events\TaskCreatedEvent;
use App\Models\User;
use Database\Factories\StatisticsFactory;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatisticsService
{
    use HasFactory;
    public function find(int $id): User
    {
        return User::find($id);
    }

    public function getTop10Users()
    {
        return Statistics::query()->with('user')
            ->orderBy('tasks_count', 'desc')
            ->take(10)->get();
    }

    protected static function newFactory(): Factory
    {
        return StatisticsFactory::new();
    }
}
