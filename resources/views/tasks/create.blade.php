@extends('layouts.app')

@section('title', 'Task Index')

@section('contents')
<form class="my-4" action="/tasks" method="POST">
    @include('tasks._form')
    <!-- submit -->
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@include('tasks.index')
@endsection