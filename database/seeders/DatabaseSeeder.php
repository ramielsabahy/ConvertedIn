<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\RolesEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
        ]);
         User::factory()
             ->afterCreating(function (User $user) {
                 $user->assignRole(RolesEnum::ADMIN);
             })
             ->count(100)
             ->create();
        User::factory()
            ->afterCreating(function (User $user) {
                $user->assignRole(RolesEnum::USER);
            })
            ->count(10000)
            ->create();
         $this->call([
             TasksSeeder::class
         ]);
    }
}
