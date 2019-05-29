<?php

declare(strict_types = 1);

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UsersSeeder
 */
class UsersSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        factory(User::class, 1)->create(['email' => 'dima.matters@gmail.com']);
    }
}
