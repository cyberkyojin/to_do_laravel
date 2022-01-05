@extends('layouts.main')

@section('title', 'To Do')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100 text-white">
        <div class="col-6 border rounded border-3 border-info bg-dark p-4" style="min-height: 250px;">
            <form action="/task" method="POST" class="row justify-content-end align-items-center">
                @csrf
                <div class="col-10">
                    <input type="text" name="task" placeholder="Task" class="form-control border border-2 border-info" />
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-lg btn-info">Add</button>
                </div>
            </form>
            <div class="border-bottom border-info my-3"></div>
            @foreach ($tasks as $task)
            <div class="card bg-dark border-0">
                <div class="row align-items-center p-2 border-bottom border-info">
                    <div class="col-8">
                        <span>{{ $task->task }}</span>
                    </div>
                    <div class="col-1">
                        <form action="/task/delete/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-info">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal-{{ $task->id }}">
                            <i class="bi bi-pencil text-info"></i>
                        </button>
                        <div class="modal" id="myModal-{{ $task->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark">
                                    <div class="modal-body">
                                        <form action="/task/update/{{ $task->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="editTask" class="form-control" value="{{ $task->task }}" placeholder="Task" />
                                            <button type="submit" class="btn btn-info">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
