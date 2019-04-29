<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Inventory;
use App\Shipment ;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipments = Shipment::all();

        return view('shipment.index')->with('shipments', $shipments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shipments = DB::table('products')
        ->join('inventories', 'products.product_id', '=', 'inventories.product_id')
        ->select('products.*', 'inventories.*')
        ->where('products.status', '=', 'In Stock')
        ->get();

        return view('shipment.create')->with('shipments', $shipments);
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
        'product_id' => 'required',
        'quantity' => 'required',
        'send_date' => 'required',
        'receive_date' => 'required'
        ]);

        $shipment = new Shipment;
        $product = Product::find($request->product_id);
        $inventory = Inventory::where('product_id', $product->product_id)->first();

        if($request->quantity <= $inventory->quantity)
        {
            $shipment->product_id = $product->product_id;
            $shipment->name = $product->name;
            $shipment->quantity = $request->quantity;
            $shipment->added_by = session('uname');
            $shipment->send_date =  $request->send_date;
            $shipment->receive_date =  $request->receive_date;
            $shipment->save();

            $inventory->quantity = $inventory->quantity - $request->quantity;
            $inventory->save();            
        }
        else
        {
            return redirect()->back()->with('message', 'Not enough quantity in stock.');
        }



        return redirect()->back()->with('message', 'Shipment Request Sent.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $shipment = Shipment::where('product_id', $product_id)->first();
        $shipment->delete();  
        return redirect()->route('shipment.index');
    }

    public function quantity_check(Request $request)
    {
        $product = Product::find($request->product_id);
        $inventory = Inventory::where('product_id', $product->product_id)->first();

        if($request->value <= $inventory->quantity)
        {
            return response()->json(['success'=>'Product Quantity Available.']);
        }
        else
        {
            return response()->json(['success'=>'Product Quantity Not Available.']);
        }
    }

}
