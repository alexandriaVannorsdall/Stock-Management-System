@extends('layouts.app')

@section('title', 'Edit Inventory')

@section('content')
    <h1><strong>Please fill in the blanks to edit an inventory.</strong></h1>
    <x-inventory-form :inventory="$inventory" :errors="$errors" />
@endsection
