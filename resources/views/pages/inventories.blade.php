@extends('layouts.app')

@section('title', 'My Inventory')

@section('content')
    <h1>Inventory Table</h1>
   <table class="table">
       <caption class="caption">This is the inventory table made using PHP Laravel that is randomly generated.</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>In stock</th>
                <th>On sale</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
            <tr>
                <td>{{$inventory->id}}</td>
                <td>{{$inventory->title}}</td>
                <td>{{$inventory->description}}</td>
                <td> &pound;{{ number_format($inventory->price, 2) }}</td>
                <td>{{$inventory->in_stock}}</td>
                <td>{{ $inventory->on_sale ? 'Yes' : 'No' }}</td>
                <td><a href="{{ route('inventories.edit', $inventory) }}" class="btn btn-outline-secondary">Edit</a></td>
                <td><a href="{{ route('inventories.delete', $inventory) }}" class="btn btn-outline-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
