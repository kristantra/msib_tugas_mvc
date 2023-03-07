<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- csrf buat ngeluarno token e laravel harus didalem e form -->
    <h1>edit</h1>
    
    <form action="{{url('products/'.$product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="input_nama" value="{{ $product->product_name}}" placeholder="{{ $product->product_name}}">
        <input type="number" name="input_harga" value="{{ $product->price}}" placeholder="{{ $product->price}}">
        <button type="submit">SUB MIT</button>
    </form>

    <a href="{{ url('products') }}">Go back</a>
</body>

</html>