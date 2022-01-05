<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index() {

        $tasks = Task::all();

        return view('todo.index', compact('tasks'));
    }

    public function store(Request $request) {
        
        $task = new Task;

        $task->task = $request->task;

        $task->save();

        return redirect('/');
    }

    public function destroy($id) {
        
        Task::findOrFail($id)->delete();

        return redirect('/');
    }

    public function update(Request $request, $id) {

        Task::findOrFail($id)->delete();

        $task = new Task;
        
        $task->task = $request->editTask;

        $task->save();

        return redirect('/');

    }

}
