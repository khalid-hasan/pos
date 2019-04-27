<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $inventories = DB::table('products')
            ->join('inventories', 'products.product_id', '=', 'inventories.product_id')
            ->select('products.*', 'inventories.*')
            ->where('products.status', '=', 'In Stock')
            ->get();

        return view('inventory.index')->with('inventories', $inventories);
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
        //
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
        $inv = Inventory::where('product_id', $product_id)->first();
        $product = Product::find($product_id);

        $inventory = [
            'inv' => $inv,
            'product' => $product
        ];
        return view('inventory.edit')->with('inventory', $inventory);
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
        request()->validate([
        'quantity' => 'required',
        ]);
                
        $inventory = Inventory::where('product_id', $product_id)->first();
        $inventory->quantity = $request->quantity;
        $inventory->save();
        return redirect()->back()->with('message', 'Product Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $inventory = Inventory::where('product_id', $product_id)->first();
        $inventory->delete();  
        return redirect()->route('inventory.index');
    }
}
