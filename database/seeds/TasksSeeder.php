<?php

declare(strict_types = 1);

use App\Models\Task;
use Illuminate\Database\Seeder;

/**
 * Class TasksSeeder
 */
class TasksSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        factory(Task::class, 200)->create();
    }
}
