@extends('layouts.app')

@section('content')
    <form action="{{ URL::route('task.action', [$task]) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="body">Body</label>
            <input type="text"
                   name="body"
                   class="form-control"
                   id="body"
                   value="{{ $task->getAttribute('body') }}">
        </div>

        <a href="{{ URL::route('task.index') }}" class="btn bg-secondary text-white">Cancel</a>

        <button type="submit" class="btn btn-danger" name="action" value="delete">Delete</button>

        @if ($task->getAttribute('done_at'))
            <button type="submit" class="btn btn-warning" name="action" value="undone">
                Mark as undone
            </button>
        @else
            <button type="submit" class="btn btn-success" name="action" value="done">
                Mark as done
            </button>
        @endif

        <button type="submit" class="btn btn-primary" name="action" value="update">Update</button>
    </form>
@endsection
