<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        return view('index', [
            'tasks_in_progress' => Task::with('user')->where('done', false)->where('user_id', Auth::user()->id)->search($request)->get(),
            'tasks_done' => Task::with('user')->where('done', true)
                                ->where('user_id', Auth::user()->id)
                                ->search($request) // Filter tasks for the authenticated user
                                ->get()
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $validate = $request->validated();
        Task::create($validate);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('show',['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        //dd($request);
        if (Auth::user()->id==$request->user_id) {
            $validated=$request->validated();
            $task->update($validated);
        }
        return redirect()->route('tasks.show',['task'=>$task]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
