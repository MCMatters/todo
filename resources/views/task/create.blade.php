@extends('layouts.app')

@section('content')
    <form action="{{ URL::route('task.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="body">Body</label>
            <input type="text" class="form-control" name="body" id="body">
        </div>

        <a href="{{ URL::route('task.index') }}" class="btn bg-secondary text-white">Cancel</a>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
