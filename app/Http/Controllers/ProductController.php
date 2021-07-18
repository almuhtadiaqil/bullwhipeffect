<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('pages.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'product' => $request->product,
            'stock' => $request->stock,
            'product_date' => now(),
            'product_image' => Product::uploadPhoto($request->file('product_image'))
        ]);
        return redirect('product')->with('pesan_create', 'Product berhasil ditambahkan ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        if ($request->file('product_image')) {
            Product::where('id', $id)->update([
                'stock' => $product->stock + $request->stock,
                'product_image' => Product::uploadPhoto($request->file('product_image'))
            ]);
        } else {
            Product::where('id', $id)->update([
                'stock' => $product->stock + $request->stock,
            ]);
        }
        return redirect('product')->with('pesan_edit', 'Product berhasil diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('product')->with('pesan_delete', 'Product berhasil dihapus !');
    }
}
