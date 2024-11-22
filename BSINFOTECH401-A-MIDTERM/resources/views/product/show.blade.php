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
        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn {
            width: 100px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            opacity: 0.8;
        }
        .description {
            font-size: 1.1em;
            margin-bottom: 20px;
        }
        .price {
            font-size: 1.5em;
            color: #28a745;
        }
    </style>
    <title>DASHBOARD</title>
</head>

<body>
    <div class="container mt-4">
        <h1><i class="fas fa-eye"></i> {{$product->name}}</h1>
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="product-image">
        <p class="description"><strong>Description: </strong>{{$product->description}}</p>
        <p class="price"><strong>Price: </strong>${{number_format($product->price, 2)}}</p>
        
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
            <form action="{{route('product.destroy', $product->id)}}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
            <a href="{{ route('product.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</body>

</html>