<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        img {
            max-height: 100px;
            max-width: 100px;
        }
    </style>
    
</head>

<body>
    <h1>INDEX</h1>
  
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Photos</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->product_name }}</td>
                        <td>{{ $p->price }}</td>
                        <td><img src="{{ asset('images/' . $p->image) }}" alt="{{ $p->product_name }}"></td>
                        <td>
                            <div class="button-group">
                                <a href="{{ url('products/'.$p->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a> 
                                {{-- format delete adalah sbb --}}
                                <form action="{{url('products/'.$p->id)}}" method="POST">
                                 @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                {{-- sampai sini --}}
                                <a href="{{ url('products/'.$p->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    
    <a href="{{ url('products/create') }}" class="btn btn-primary">Create</a>
</body>
</html>
