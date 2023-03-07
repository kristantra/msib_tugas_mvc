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
    <h1>CREATE</h1>
    <form action="{{url('products')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <!--form -> CSRF artinya create
        kalo form -> CSRF -> method=put EDIT
    FORM -> CSRF -> METHOD=DELETE deelte -->
        <input type="text" name="input_nama"placeholder="input nama barang">
        <input type="number" name="input_harga"placeholder="input harga barang">
        <input type="file" name="input_image" id="input_image"placeholder="input image">
        {{-- kalo kamu ada input file, apapun itu, foto, pdf, di text form harzus ditambai namanya enctype="multipart/form-data" --}}
        <button type="submit">SUB MIT</button>
        {{-- create nggak ada method (default), krn laravel bawaannya gitu
            tp kalo  --}}
    </form>
    <a href="{{ url('products') }}">Go back</a>

</body>

</html>