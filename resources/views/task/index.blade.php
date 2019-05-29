@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ URL::route('task.create') }}">+ Create</a>
        </div>
    </div>

    @foreach($tasks as $task)
        <div class="card my-3">
            <div class="card-body @if ($task->getAttribute('done_at')) bg-light @endif">
                <div class="row">
                    <div class="col-lg-1">
                        <input type="checkbox"
                               disabled
                               {{ $task->getAttribute('done_at') ? 'checked' : '' }}
                               value="{{ $task->getKey() }}">
                    </div>
                    <div class="col-lg-10">
                        {{ $task->getAttribute('body') }}
                    </div>
                    <div class="col-lg-1">
                        <a href="{{ URL::route('task.edit', [$task]) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
