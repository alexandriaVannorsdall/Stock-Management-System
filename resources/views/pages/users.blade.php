@extends('layouts.app')

@section('title', 'List of Users')

@section('content')
    <h1>List of Users</h1>
    <table class="table">
        <caption class="caption">This is the users table made using PHP Laravel that is randomly generated.</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{ route('users.edit', $user) }}" class="btn btn-outline-secondary">Edit</a></td>
                <td><a href="{{ route('users.delete', $user) }}" class="btn btn-outline-danger">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
