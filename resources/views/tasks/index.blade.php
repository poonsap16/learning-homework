@extends('layouts.app')

@section('title', 'Task Index')

@section('contents')
@include('tasks._form')
<h1>Tasks</h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ประเภทงาน</th>
      <th scope="col">ชื่องาน</th>
      <th scope="col">รายละเอียด</th>
      <th scope="col">สถานะ</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tasks as $task)
    <tr>

      <th scope="row">{{ $task->id }}</th>
      <td>{{ $task->type }}</td>
      <td>{{ $task->name }}</td>
      <td>{{ $task->detail }}</td>
      <td>{{ $task->status ? 'เสร็จแล้ว' : 'ยังไม่เสร็จ' }}</td>
      <td>
        <form id="check-complate-{{ $task->id }}" action="/tasks/{{ $task->id }}" method="POST" style="display: none;">
        @csrf
        @method('patch')
          <input type="hidden" name="status" value="1">
        </form>

        @if(!$task->status)
          <button class="btn btn-sm btn-info"
                  onclick="document.getElementById('check-complate-{{ $task->id }}').submit()">ทำเสร็จแล้ว
          </button>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection



