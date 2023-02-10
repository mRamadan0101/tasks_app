<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreDepartmentRequest;
use App\Http\Requests\Dashboard\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\Employee;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return view('dashboard.department.index', ['departments' => $departments]);
    }

    public function create()
    {
        return view('dashboard.department.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $request->validated();
        \DB::transaction(function () use ($request) {
            $department = Department::create([
                'title' => $request->title,
            ]);
        });

        return redirect(action('Dashboard\DepartmentController@index'));
    }

    public function edit($id)
    {
        $department = Department::find($id);

        return view('dashboard.department.edit', ['department' => $department]);
    }

    public function delete($id)
    {
        $department = Department::find($id);
        $employee_count = Employee::whereDepartmentId($department->id)->count();
        if (0 == $employee_count) {
            $department->delete();

            return redirect(action('Dashboard\DepartmentController@index'));
        } else {
            return redirect(action('Dashboard\DepartmentController@index'))->withErrors(['errors' => $department->title.' assigned to users and not empty']);
        }
    }

    public function update(UpdateDepartmentRequest $request)
    {
        $department = Department::find($request->id);
        $request->validated();
        \DB::transaction(function () use ($request, $department) {
            $department->update([
                'title' => $request->title,
            ]);
        });

        return redirect(action('Dashboard\DepartmentController@index'));
    }
}
