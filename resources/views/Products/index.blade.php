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
    
    <div class="container d-flex justify-content-center mt-3">
        <a href="{{ url('products/create') }}" class="btn btn-primary btn-lg">Create</a>
      </div>
    <div class="container my-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Instructions</h5>
            <ol>
              <li>This website is only for practicing the CRUD feature</li>
              <li>This website also remove uploaded image from public folder. </li>
              <li>Hope you're having fun on this project too!</li>
            </ol
          </div>
        </div>
      </div>
      
    <div class="container my-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Credit</h5>
            <p class="card-text">This website was created by Dwi Krisna Tantra, a student of Petra Christian University.</p>
            <p class="card-text"> (universitas kristen petra)</p>
          </div>
          <div class="card-footer text-muted">
            © 2023 Petra Christian University. All rights reserved.
          </div>
        </div>
      </div>
      
</body>
</html>
