<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SubmitTaskRequest;

class TasksController extends Controller
{
    public function index()
    {
        $manger = auth('employees')->user();

        $tasks = $manger->tasks()->whereMangerId($manger->id)->get();

        return view('dashboard.tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $manger = auth('employees')->user();
        $employees = $manger->employees;

        return view('dashboard.tasks.create', ['employees' => $employees]);
    }

    public function store(SubmitTaskRequest $request)
    {
        $request->validated();
        $manger = auth('employees')->user();
        $manger->tasks()->create([
            'employee_id' => $request->employee_id,
            'task_description' => $request->task_description,
        ]);

        return redirect(route('tasks.list'));
    }
}
