<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)->get();
        return response()->json([
            'status' => 'success',
            'tasks' => $tasks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'end_date' => 'required|date_format:Y-m-d H:i:s',
            'priority' => 'required|string',
        ]);

        $user = Auth::user(); // Get the logged-in user

        $task = Task::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'priority' => $request->priority,
            'remarks' => $request->remarks,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'task created successfully',
            'task' => $task,
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);
        return response()->json([
            'status' => 'success',
            'task' => $task,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'end_date' => 'required|date_format:Y-m-d H:i:s',
            'priority' => 'required|string'
        ]);

        $task = Task::find($id);
        $task->name = $request->name;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->priority = $request->priority;
        $task->remarks = $request->remarks;
        $task->save();

        return response()->json([
            'status' => 'success',
            'message' => 'task updated successfully',
            'task' => $task,
        ]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'task deleted successfully',
            'task' => $task,
        ]);
    }
}
