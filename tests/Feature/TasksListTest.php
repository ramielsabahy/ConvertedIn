<?php

namespace Tests\Feature\Livewire;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\Task;
use App\Services\TaskService;

class TasksListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_tasks_correctly()
    {
        $user = User::factory()->create();
        Task::factory()->count(5)->create();

        $taskServiceMock = $this->mock(TaskService::class, function ($mock) {
            $mock->shouldReceive('index')->andReturn(Task::paginate(5));
        });

        Livewire::test('tasks-list')
            ->assertSee('Task number');
        $taskServiceMock->shouldHaveReceived('index')->once();
    }
}
