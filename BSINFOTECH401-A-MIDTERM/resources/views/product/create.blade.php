<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px;
        }
        h1 {
            color: #343a40;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn {
            width: 100%;
            margin-top: 10px;
        }
    </style>
    <title>DASHBOARD</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center"><i class="fas fa-plus-circle"></i> Add Product</h1>

        <form action="{{ route('product.store') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name"><i class="fas fa-tag"></i> Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-pencil-alt"></i> Description</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price"><i class="fas fa-dollar-sign"></i> Price</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image URL</label>
                <input type="text" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Add Product</button>
            <a href="{{ route('product.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-2XzM9cQ8bQ6kZz6+5eFh3Ygk3YxZ3Xh6j6R3c4P5b5LQ0g5m+q0P7m8z6g5Z5n3" crossorigin="anonymous"></script>
</body>
</html>