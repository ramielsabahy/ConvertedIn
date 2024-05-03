<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public function render()
    {
        $tasks = Task::paginate();
        return view('livewire.tasks-list', compact('tasks'));
    }
}
