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
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            padding: 40px;
            margin-top: 40px;
        }

        h1 {
            color: #343a40;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
        }

        .btn {
            width: 150px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: none;
        }

        .form-control.is-invalid~.invalid-feedback {
            display: block;
        }

        .image-preview {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: none;
            /* Initially hidden */
        }
    </style>
    <title>Edit Product</title>
</head>

<body>
    <div class="container mt-4">
        <h1><i class="fas fa-edit"></i> Edit Product</h1>

        <form action="{{ route('product.update', $product->id) }}" method="post" novalidate
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description', $product->description) }}" required>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                    onchange="updateImagePreview(this)">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <!-- Image Preview -->
                <img id="imagePreview" class="image-preview" src="{{ asset('storage/' . ($product->image ?? '')) }}"
                    alt="Image Preview"
                    style="display: {{ $product->image ? 'block' : 'none' }}; max-width: 150px; margin-top: 10px;">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Edit Product</button>
                <a href="{{ route('product.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
            </div>
        </form>

        <script>
            // Handle Image Preview
            function updateImagePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        </form>
    </div>

    <script>
        // Function to update image preview
        function updateImagePreview(input) {
            var preview = document.getElementById('imagePreview');
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none'; // Hide the preview if no file is selected
            }
        }
    </script>
</body>

</html>