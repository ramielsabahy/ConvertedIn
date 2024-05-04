<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\TaskService;
use App\Services\UserService;
use Livewire\Component;

class CreateTask extends Component
{
    public $adminId;
    public $title;
    public $userId;
    public $description;

    public function render()
    {
        return view('livewire.create-task');
    }

    public function submit(TaskService $service, UserService $userService)
    {
        $service->store([
            'title' => $this->title,
            'description' => $this->description,
            'assigned_by_id' => $this->adminId,
            'assigned_to_id' => $this->userId,
        ], $userService);
        return redirect()->route('tasks.index');
    }
}
