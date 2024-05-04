<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\RolesEnum;
use App\Services\TaskService;
use App\Services\UserService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(TaskService $taskService, UserService $userService): void
    {
        for ($tasksCount = 0; $tasksCount < 1000; $tasksCount++) {
            DB::beginTransaction();
            try {
                $assigned = User::whereHas('roles', function ($query) {
                    $query->where('name', '<>', RolesEnum::ADMIN);
                })->inRandomOrder()->first()->id;;
                $taskService->store([
                    'title' => 'Task ' . $tasksCount,
                    'description' => 'Task ' . $tasksCount.' description',
                    'assigned_to_id'    => $assigned,
                    'assigned_by_id'    => User::whereHas('roles', function ($query) {
                        $query->where('name', '=', RolesEnum::ADMIN);
                    })->inRandomOrder()->first()->id,
                ], $userService);
                DB::commit();
            }catch (\Exception $exception){
                Log::error($exception->getMessage());
                DB::rollBack();
            }
        }
    }
}
