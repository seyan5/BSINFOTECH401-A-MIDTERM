<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>DASHBOARD</title>
</head>

<body>
    <div class="container mt-4">
        <h1>{{$product->name}} </h1>
        <p><strong>Description: </strong>{{$product->description}}</p>
        <p><strong>Price: </strong>{{$product->price}}</p>
        <p><strong>Image: </strong>{{$product->image}}</p>
        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info">Edit</a>
        <form action="{{route('product.destroy', $product->id)}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('product.index')}}" class="btn btn-primary">Back</a>
    </div>
</body>

</html>