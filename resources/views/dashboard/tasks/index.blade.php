@extends('dashboard.layouts.app')


@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a class="btn btn-success" href="{{ action('Dashboard\TasksController@create') }}">New</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">manger</th>
                <th scope="col">employee</th>
                <th scope="col">Description</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->manger->full_name }}</td>
                    <td>{{ $task->employee->full_name }}</td>
                    <td>{{ $task->task_description }}</td>
                    <td>{{ App\Models\Task::STATUS[$task->status] }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
