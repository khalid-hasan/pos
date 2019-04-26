<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Inventory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $acc = Product::all();

        // return view('accounts.index')->with('accounts', $acc);
        $products = DB::table('products')
            ->join('inventories', 'products.product_id', '=', 'inventories.product_id')
            ->select('products.*', 'inventories.*')
            ->get();

        return view('product.index')->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $product = new Product;
        $inventory = new Inventory;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->added_by = session('uname');
        $product->date =  date('Y-m-d H:i:s');
        $product->status = 1;
        $inventory->quantity = $request->quantity;
        $product->save();
        $product->inventory()->save($inventory);

        return redirect()->back()->with('message', 'Product Added.');
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
    public function edit($product_id)
    {
        $product = Product::find($product_id);
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect()->back()->with('message', 'Product Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destory($product_id)
    {
        $product = Product::find($product_id);
        $product->inventory()->delete(); 
        $product->delete();  
        // $inventory = Inventory::destroy($product_id);
        // $product = Product::destroy($product_id);
        return redirect()->route('product.index');
    }
}
