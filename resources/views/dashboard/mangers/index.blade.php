@extends('dashboard.layouts.app')
@section('title', __('announcements.credit_announcements'))

@section('content')
    <a class="btn btn-success" href="{{ action('Dashboard\MangerController@create') }}">New</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Salary</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mangers as $manger)
                <tr>
                    <th scope="row">{{ $manger->id }}</th>
                    <td>{{ $manger->full_name }}</td>
                    <td>{{ $manger->salary }}</td>
                    <td>{{ $manger->image }}</td>
                    <td><a href="{{ action('Dashboard\MangerController@edit', ['id' => $manger->id]) }}" ><i class="fa fa-edit"></i></a>
                        <a href="{{ action('Dashboard\MangerController@delete', ['id' => $manger->id]) }}" ><i class="fa fa-trash"></i></a> </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
