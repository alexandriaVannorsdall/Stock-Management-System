@extends('layouts.app')

@section('title', 'Create a new User')

@section('content')
    <h1><strong>Please fill in the blanks to create a new user.</strong></h1>
    <x-user-form :user="null" :errors="$errors" />
@endsection
