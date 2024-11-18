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
        <h1> Products </h1>
        <a href = "{{route ('product.create')}}" class = "btn btn-success">Add New Product</a>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </thead>

            <tbody>
            
                <tr>
                    <td colspan="5">Nothing to Found</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>