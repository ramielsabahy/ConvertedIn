<?php

namespace App\Livewire;

use App\Services\StatisticsService;
use Livewire\Component;

class TaskStatistics extends Component
{
    public function render(StatisticsService $userService)
    {
        $statistics = $userService->getTop10Users();
        return view('livewire.task-statistics', compact('statistics'));
    }
}
