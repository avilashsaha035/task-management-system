<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('backend.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = new Task();

        $task->title       = $request->title;
        $task->description = strip_tags($request->description);
        $task->status      = $request->status;
        $task->priority    = $request->priority;
        $task->due_date    = $request->due_date;

        $task->save();

        return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->status = $request->status;
        $task->save();

        return response()->json(['success' => true]);
    }

    public function updatePriority(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->priority = $request->priority;
        $task->save();

        return response()->json(['success' => true]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
