@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Product List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->subcategory_name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', ['id' => $product->id]) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>
    </div>
@endsection
