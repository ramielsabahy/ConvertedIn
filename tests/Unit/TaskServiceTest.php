<?php

namespace Tests\Unit;

use App\Events\TaskCreatedEvent;
use App\Models\Task;
use App\Models\User;
use App\RolesEnum;
use App\Services\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TaskServiceTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_can_return_paginated_tasks()
    {
        $this->createUsers();
        Task::factory()->count(15)->create();
        $service = new TaskService();
        $result = $service->index();
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
        $this->assertEquals(10, $result->perPage());
        $this->assertEquals(15, $result->total());
    }

    /** @test */
    public function it_can_store_a_task_and_increment_user_tasks_count()
    {
        $userService = \Mockery::mock('App\Services\UserService');
        $userService->shouldReceive('find')->andReturn(User::factory()->create());

        $service = new TaskService();
        $this->createRole();
        $users = $this->createUsers();
        $this->assignUserToRole($users);
        $data = [
            'title' => 'Test Task',
            'description' => 'This is a test task.',
            'assigned_to_id' => $users['user']->id,
            'assigned_by_id' => $users['admin']->id,
        ];

        $task = $service->store($data, $userService);

        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals($data['title'], $task->title);
        $this->assertEquals($data['description'], $task->description);
        $user = User::find($data['assigned_to_id']);

        Event::fake();
        Event::dispatch(new TaskCreatedEvent($users['user']));
        Event::assertDispatched(TaskCreatedEvent::class, function ($event) use ($user) {
            return $event->user->id === $user->id;
        });
    }

    private function createRole()
    {
        Role::create(['name' => RolesEnum::ADMIN]);
        Role::create(['name' => RolesEnum::USER]);
    }

    private function createUsers()
    {
        $user = User::factory()->create();
        $admin = User::factory()->create();
        return [
            'user' => $user,
            'admin' => $admin
        ];
    }

    private function assignUserToRole($users)
    {
        $users['user']->assignRole(RolesEnum::USER);
        $users['admin']->assignRole(RolesEnum::ADMIN);
    }
}
