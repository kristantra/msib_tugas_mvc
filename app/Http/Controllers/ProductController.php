<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //buat halaman untamanya   (GAK PERLU ROUTING ROUTES )
    {
        //nampilin produk
        // 1. ini cara query builder (doc)
        //$product = DB::table('products')->get(); 
        // 2. eloquent 
        $product = Product::all();

        //$distributor =
        //cara ngelempar variable ke view(html) pake php
        //1. PAKE COMPACT
        return view('Products/index', compact('product')); //nembak ke products/index

        //2. associative array.
        //  return view('Products/index', ["product" => $product]); 
        //  return view('Products/index'); //nembak ke products/index

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //buka products/create
    {
        //ngelempar ke halaman createnya
        return view('Products/create');  //view(products/create itu FOLDER) 
        //http://127.0.0.1:8000/products/create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form -> CSRF KE STORE (SOALE CREATE)
        //proses penyimpanan data
        //logic nyimpen ke database
        //dd($request); dd untuk dump and die, supaya bisa liat erornya dimana.
        // dd($request->file('input_image'));
        // dd($request);
        $filename = time() . '.' . $request->file('input_image')->getClientOriginalExtension();  //mengubah nama random biar tidak nabrak menggunakan timestamp
        $request->file('input_image')->move(public_path('images'), $filename);

        //store eloquent
        $product = new Product();
        $product->product_name = $request->get('input_nama'); //dari name input form
        $product->price = $request->get('input_harga');

        $product->image = $filename; //ngasih tau nama barunya
        $product->save(); //masuk database
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // dd($product->product_name);
        //ngelempar ke halaman detail
        return view('Products/detail', compact('product')); //http://127.0.0.1:8000/products/1 (harus diisi idnya)
        //compact merupakan function untuk mengirim isi seluruh phpmyadmin, jika mau trial and error coba ketik dd($product->product_name)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //lempar ke halaman edit (bukan lakuiin logic edit)
        return view('Products/update', compact('product')); //http://127.0.0.1:8000/products/1/edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //form -> CSRF -> METHOD=PUT  KE UPDATE (SOALE EDIT)

        // melakukan logicnya buat update data jadi tanpa return view

        //request = data baru yang kamu input dari form view
        //product = data lama yang kamu pingin update

        $product->product_name = $request->get('input_nama');
        $product->price = $request->get('input_harga');
        $product->save();
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //form -> CSRF -> method=delete  KE destroy (SOALE delete)

        //buat delete data (harus ada logic nya)
        $product->delete();
        return redirect('products');
    }
}
