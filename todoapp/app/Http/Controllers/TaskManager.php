<?php

namespace App\Http\Controllers;
use App\Models\Tasks;

use Illuminate\Http\Request;

class TaskManager extends Controller
{
    function addTask()
    {
        return view('tasks.add');
    }

    function addTaskPost(Request $request){
        $request->validate([
           'title' => 'required',
           'description' => 'required',
           'deadline' => 'required',
        ]);
        $task = new Tasks();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        if($task->save()){
            return redirect(route("tasks"));
        }
    }
}
