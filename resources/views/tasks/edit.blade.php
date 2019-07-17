@extends('layouts.app')

@section('title', 'Task Index')

@section('contents')
<form class="my-4" action="/tasks/{{ $task->id }}" method="POST">
    @method('put')
    @include('tasks._form')
    <!-- submit -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>

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
      <td>{{ $task->getTypeName() }}</td>
      <td>{{ $task->name }}</td>
      <td>{{ $task->detail }}</td>
      <td>{{ $task->status ? 'เสร็จแล้ว' : 'ยังไม่เสร็จ' }}</td>
      <td>

          <a class="btn btn-sm btn-success" href="/tasks/{{ $task->id }}/edit" 
                  >แก้ไข
          </a>


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
        <form id="delete-{{ $task->id }}" action="/tasks/{{ $task->id }}" method="POST" style="display: none;">
        @csrf
        @method('delete')
        </form>

          <button class="btn btn-sm btn-danger" onclick="document.getElementById('delete-{{ $task->id }}').submit()"
                  >ลบ
          </button>
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection



