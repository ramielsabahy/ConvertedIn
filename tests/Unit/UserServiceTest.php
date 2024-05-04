<?php

namespace Tests\Unit;

use App\Models\Statistics;
use App\Models\Task;
use App\Models\User;
use App\Services\StatisticsService;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_return_top_10_users_ordered_by_task_count()
    {
        User::factory()->count(15)->create();
        Task::factory()->count(15)->create();
        Statistics::factory(10)->create();
        $service = new StatisticsService();

        $statistics = $service->getTop10Users();

        $this->assertInstanceOf(Collection::class, $statistics);
        $this->assertCount(10, $statistics);

        $previousCount = PHP_INT_MAX;
        foreach ($statistics as $statistic) {
            $this->assertLessThanOrEqual($previousCount, $statistic->tasks_count);
            $previousCount = $statistic->tasks_count;
        }
    }
}

