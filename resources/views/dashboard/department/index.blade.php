@extends('dashboard.layouts.app')


@section('content')
@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <ul class="p-0 m-0" style="list-style: none;">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
    <a class="btn btn-success" href="{{ action('Dashboard\DepartmentController@create') }}">New</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{ $department->id }}</th>
                    <td>{{ $department->title }}</td>
                    <td><a href="{{ action('Dashboard\DepartmentController@edit', ['id' => $department->id]) }}" ><i class="fa fa-edit"></i></a>
                        <a href="{{ action('Dashboard\DepartmentController@delete', ['id' => $department->id]) }}" ><i class="fa fa-trash"></i></a> </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
