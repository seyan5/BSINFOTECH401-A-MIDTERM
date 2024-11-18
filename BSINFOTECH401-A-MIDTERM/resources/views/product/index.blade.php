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
    <div class="container mt-5">
        <h1> Products </h1>
        <a href="{{route('product.create')}}" class="btn btn-success">Add New Product</a>
        <br> <br>
        @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif

        <table class="table">
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
            </thead>

            <tbody>
                @foreach ($product as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->image}}</td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{route('product.destroy', $product->id)}}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Delete</b>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>