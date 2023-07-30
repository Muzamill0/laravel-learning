<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="md-col-6">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="md-col-6 text-end">
                        <a href="{{ route('products') }} " class="btn btn-primary">Back</a>
                    </div>
                </div>
                {{-- @dd($product) --}}
                <div class="card-body">
                    @if (session()->has('error'))
                        <p class="text-danger">{{ session()->get('error') }}</p>
                        @elseif (session()->has('success'))
                        <p class="text-success">{{ session()->get('success') }}</p>
                    @endif
                    <form action="{{ route('product.edit',$product) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') ? old('name') : $product->name  }}" placeholder="Enter the name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description"
                                value="{{ old('description') ? old('description') : $product->description }}" id="description" placeholder="Enter the description">
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}"
                                id="image" placeholder="Enter the image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
