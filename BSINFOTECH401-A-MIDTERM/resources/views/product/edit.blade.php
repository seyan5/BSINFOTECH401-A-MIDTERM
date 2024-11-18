<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>DASHBOARD</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Product</h1>

        <form action = "{{route ('product.update', $product->id)}}" method = "post">
            <input type="hidden" name="_method" value = "PUT">
            <input type="hidden" name="_token" value = "{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type = "text" name = "name" class="form-control" value = "{{$product->name}}" required>
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <input type = "text" name = "description" class="form-control" value = "{{$product->description}}" required>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type = "text" name = "price" class="form-control" value = "{{$product->price}}"  required>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <input type = "text" name = "image" class="form-control" value = "{{$product->image}}" required>
            </div> <br>
            <button type = "submit" class = "btn btn-success">Edit Product</button>
            <a href = "{{route('product.index')}}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>