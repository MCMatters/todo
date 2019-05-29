<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
         $this->call(UsersSeeder::class);
         $this->call(TasksSeeder::class);
    }
}
