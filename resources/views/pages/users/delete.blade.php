@extends('layouts.app')

@section('title', 'Delete User')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Delete User</h1>
            <p class="text-center">Are you sure you want to delete the user {{ $user->name }}?</p>
            <form class="form" method="POST" action="{{url('/users', $user)}}">
                @method('delete')
                @csrf
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success">Yes</button>
                    <a href="/users" class="btn btn-outline-dark">No</a>
                </div>
            </form>
        </div>
@endsection
