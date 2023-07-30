
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header row">
                    <div class="md-col-6">
                        <h2>Products</h2>
                    </div>
                    <div class="md-col-6 text-end">
                        <a href="{{ route('product.create') }}" class="btn btn-outline-primary">Create Product</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('error'))
                    <p class="text-danger">{{ session()->get('error') }}</p>
                    @endif

                    @if (count($products) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S no</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img src="{{ asset('uploads/'.$product->image) }}" width="100"  alt=""></td>
                                <td>
                                    <a href="{{ route('product.edit',$product) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('product.delete', $product) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-danger">No Record found</p>
                    @endif


                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
