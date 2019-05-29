<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

/**
 * Class TaskPolicy
 *
 * @package App\Policies
 */
class TaskPolicy
{
    /**
     * @param \App\Models\User $user
     * @param \App\Models\Task $task
     *
     * @return bool
     */
    public function update(User $user, Task $task): bool
    {
        return $this->doesTaskBelongToUser($user, $task);
    }

    /**
     * @param \App\Models\User $user
     * @param \App\Models\Task $task
     *
     * @return bool
     */
    public function done(User $user, Task $task): bool
    {
        return $this->doesTaskBelongToUser($user, $task);
    }

    /**
     * @param \App\Models\User $user
     * @param \App\Models\Task $task
     *
     * @return bool
     */
    public function undone(User $user, Task $task): bool
    {
        return $this->doesTaskBelongToUser($user, $task);
    }

    /**
     * @param \App\Models\User $user
     * @param \App\Models\Task $task
     *
     * @return bool
     */
    public function destroy(User $user, Task $task): bool
    {
        return $this->doesTaskBelongToUser($user, $task);
    }


    /**
     * @param \App\Models\User $user
     * @param \App\Models\Task $task
     *
     * @return bool
     */
    protected function doesTaskBelongToUser(User $user, Task $task): bool
    {
        return $user->getKey() === $task->getAttribute('user_id');
    }
}
