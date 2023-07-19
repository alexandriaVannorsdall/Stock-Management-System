@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h1><strong>Please fill in the blanks to edit this user.</strong></h1>
    <x-user-form :user="$user" :errors="$errors" />
@endsection
