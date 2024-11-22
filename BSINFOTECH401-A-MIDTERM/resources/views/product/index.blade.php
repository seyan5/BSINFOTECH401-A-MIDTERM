<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 40px;
        }
        h1 {
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }
        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn {
            width: 100px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            opacity: 0.8;
        }
        .alert {
            margin-bottom: 20px;
        }
        .product-image {
            width: 50px;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s;
        }
        .product-image:hover {
            transform: scale(1.1);
        }
    </style>
<title>DASHBOARD</title>
</head>

<body>
    <div class="container mt-5">
        <h1><i class="fas fa-box"></i> Products</h1>
        <a href="{{ route('product.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus-circle"></i> Add Product</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>P{{ number_format($product->price, 2) }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="product-image" style="width: 100px; height: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
