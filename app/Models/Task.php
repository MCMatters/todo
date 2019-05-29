<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use const null;

/**
 * Class Task
 *
 * @package App\Models
 */
class Task extends Model
{
    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var array
     */
    protected $fillable = [
        'body',
        'user_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'body' => 'string',
        'done_at' => 'timestamp',
        'user_id' => 'int',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'user');
    }

    /**
     * @return bool
     */
    public function done(): bool
    {
        return $this->forceFill(['done_at' => $this->freshTimestamp()])->save();
    }

    public function undone(): bool
    {
        return $this->forceFill(['done_at' => null])->save();
    }
}
