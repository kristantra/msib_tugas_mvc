<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #ddd;
        }
    </style>
    
</head>

<body>
    <h1>INDEX</h1>
  
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->product_name }}</td>
                    <td>{{ $p->price }}</td>
                    <td>
                        <div class="button-group">
                            <a href="{{ url('products/'.$p->id.'/edit') }}">Edit</a> 
                            <form action="{{url('products/'.$p->id)}}" method="POST">
                             @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                            </form>
                            <a href="{{ url('products/'.$p->id) }}">Detail</a>
                        </div>
                    </td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
    
    <a href="{{ url('products/create') }}">create</a>
    <br><br><br><br><br>
    <!-- comment html bisa dilihat dirender di f12 -->
    <!-- FORMATNYA PHP -->
    <?php foreach ($product as $p) : ?>
        <p> <?= $p->product_name ?> <?= $p->price ?> </p>
    <?php endforeach; ?>
    {{-- comment blade nggak bisa dilihat (dirender di f12) --}}
    <!-- FORMATNYA BLADE -->

    @foreach($product as $p)
    <p>{{$p->product_name}} {{$p->price}}</p>

    @endforeach
</body>

</html>