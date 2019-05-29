<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\Task\ActionRequest;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View as ViewFacade;

/**
 * Class TaskController
 *
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    use AuthorizesRequests;

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        return ViewFacade::make('task.index', [
            'tasks' => $request->user()->tasks()->latest()->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return ViewFacade::make('task.create');
    }

    /**
     * @param \App\Http\Requests\Task\StoreRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $request->user()->tasks()->create($request->all());

        return new RedirectResponse(URL::route('task.index'));
    }

    /**
     * @param \App\Models\Task $task
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Task $task): View
    {
        $this->authorize('update', [$task]);

        return ViewFacade::make('task.edit', ['task' => $task]);
    }

    /**
     * @param \App\Http\Requests\Task\ActionRequest $request
     * @param \App\Models\Task $task
     *
     * @return mixed
     */
    public function action(ActionRequest $request, Task $task)
    {
        return $this->{$request->get('action')}($task, $request);
    }

    /**
     * @param \App\Models\Task $task
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function update(Task $task, Request $request): RedirectResponse
    {
        $this->authorize('update', [$task]);

        $task->update($request->all());

        return new RedirectResponse(URL::route('task.index'));
    }

    /**
     * @param \App\Models\Task $task
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function done(Task $task): RedirectResponse
    {
        $this->authorize('done', [$task]);

        $task->done();

        return new RedirectResponse(URL::route('task.index'));
    }

    /**
     * @param \App\Models\Task $task
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function undone(Task $task): RedirectResponse
    {
        $this->authorize('undone', [$task]);

        $task->undone();

        return new RedirectResponse(URL::route('task.index'));
    }

    /**
     * @param \App\Models\Task $task
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    protected function destroy(Task $task): RedirectResponse
    {
        $this->authorize('destroy', [$task]);

        $task->delete();

        return new RedirectResponse(URL::route('task.index'));
    }
}
