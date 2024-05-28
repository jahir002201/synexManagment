<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            // Validate the request
            $request->validate([
                'task' =>'required',
            ]);
           $task = new Task();
           $task->project_id = $request->project_id;
           $task->title = $request->task;
           $task->save();
            flash()->options([ 'position' => 'bottom-right'])->success('Task Added successfully!');
        } catch (ValidationException $e) {
            flash()->options([ 'position' => 'bottom-right', ])->error('Task Title Required!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {


            $task->title = $request->task;
            $task->save();
            flash()->options([ 'position' => 'bottom-right'])->success('Task Updated successfully!');
            return back();



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        flash()->options([ 'position' => 'bottom-right'])->success('Task Deleted successfully!');
        return back();
    }
    public function taskStatus($id)
    {
       $task = Task::find($id);
        $task->status = $task->status == 0 ? 1 : 0;
        $task->save();
        flash()->options([ 'position' => 'bottom-right'])->success('Task Updated successfully!');
        return back();
    }
}
