<?php

namespace App\Livewire;

use App\Models\Task;
use App\Services\TaskService;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render(TaskService $taskService)
    {
        $tasks = $taskService->index();
        return view('livewire.tasks-list', compact('tasks'));
    }
}
