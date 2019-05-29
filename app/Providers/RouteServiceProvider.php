<?php

declare(strict_types = 1);

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 *
 * @package App\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->mapPatterns();
        $this->mapModels();

        parent::boot();
    }

    /**
     * @return void
     */
    public function map(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group("{$this->app->basePath()}/routes/web.php");
    }

    /**
     * @return void
     */
    protected function mapPatterns(): void
    {
        Route::pattern('task', '[0-9]+');
    }

    /**
     * @return void
     */
    protected function mapModels(): void
    {
        Route::model('task', Task::class);
    }
}
