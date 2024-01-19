<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Product List</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <div class="flex space-x-2">
                                <a href="{{ route('products.show', $product) }}" class="btn btn-info">View</a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No products available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
