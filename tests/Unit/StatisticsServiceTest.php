<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\StatisticsService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StatisticsServiceTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function it_can_find_a_user_by_id()
    {
        $user = User::factory()->create();

        $service = new StatisticsService();

        $foundUser = $service->find($user->id);

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($user->id, $foundUser->id);
        $this->assertEquals($user->name, $foundUser->name);
    }
}
