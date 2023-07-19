@extends('layouts.app')

@section('title', 'Create Inventory')

@section('content')
    <h1><strong>Please fill in the blanks to create an inventory.</strong></h1>
    <x-inventory-form :inventory="null" :errors="$errors" />
@endsection
