@extends('dashboard.layouts.app')


@section('content')
    <h1>Create New Manger</h1>
    <form action="{{ action('Dashboard\MangerController@store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phone_number" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="department_id" class="form-label">Department</label>
            <select name="department_id" id="department_id"  class="form-select" >
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" name="salary" class="form-control" id="salary" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
