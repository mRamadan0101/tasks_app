@extends('dashboard.layouts.app')

@section('content')
    <h1>Create New Task</h1>
    <form action="{{ action('Dashboard\TasksController@store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee</label>
            <select name="employee_id" id="employee_id"  class="form-select" >
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="task_description" class="form-label">Task Description</label>
            <input type="text" name="task_description" class="form-control" id="task_description" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
