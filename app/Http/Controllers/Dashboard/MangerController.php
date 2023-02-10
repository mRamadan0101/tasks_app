<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreMangerRequest;
use App\Http\Requests\Dashboard\UpdateMangerRequest;
use App\Models\Department;
use App\Models\Employee;

class MangerController extends Controller
{
    public function index()
    {
        $mangers = Employee::whereTypeId(Employee::MANGER)->get();

        return view('dashboard.mangers.index', ['mangers' => $mangers]);
    }

    public function create()
    {
        $departments = Department::all();

        return view('dashboard.mangers.create', ['departments' => $departments]);
    }

    public function edit($id)
    {
        $manger = Employee::find($id);
        $departments = Department::all();

        return view('dashboard.mangers.edit', ['manger' => $manger, 'departments' => $departments]);
    }

    public function delete($id)
    {
        $manger = Employee::find($id);
        $manger->delete();

        return redirect(action('Dashboard\MangerController@index'));
    }

    public function store(StoreMangerRequest $request)
    {
        $request->validated();
        \DB::transaction(function () use ($request) {
            $manger = Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'type_id' => Employee::MANGER,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'department_id' => $request->department_id,
                'salary' => $request->salary,
                'password' => bcrypt($request->password),
            ]);
        });

        return redirect(action('Dashboard\MangerController@index'));
    }

    public function update(UpdateMangerRequest $request)
    {
        $manger = Employee::find($request->id);
        $request->validated();
        \DB::transaction(function () use ($request, $manger) {
            $manger->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'department_id' => $request->department_id,
                'salary' => $request->salary,
            ]);
        });

        return redirect(action('Dashboard\MangerController@index'));
    }
}
