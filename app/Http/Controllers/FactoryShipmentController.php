<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\FactoryShipment;
use App\FactoryShipmentProduct;
use App\Factory;
use App\LocalInventory;

class FactoryShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory_shipments = FactoryShipment::all();

        return view('factory-shipment.index')->with('factory_shipments', $factory_shipments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factories = Factory::all();
        $products = DB::table('local_inventories')
            ->join('products', 'products.product_id', '=', 'local_inventories.product_id')
            ->select('products.name', 'products.product_id','local_inventories.*')
            ->get();

        return view('factory-shipment.create')->with('factories', $factories)->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factory_shipment = new FactoryShipment;

        $factory_shipment->shipment_name = $request->shipment_name;
        $factory_shipment->status = 'Sent';
        $factory_shipment->save();
        $shipment_id = $factory_shipment->id;

        for($id = 0; $id < count($request->product_id); $id++){
            $factory_shipment_product = new FactoryShipmentProduct;

            $factory_shipment_product->shipment_id = $shipment_id;
            $factory_shipment_product->product_id = $request->product_id[$id];
            $factory_shipment_product->quantity = $request->qty[$id];
            $factory_shipment_product->price = $request->price[$id];
            $factory_shipment_product->save();

            $local_inventory = LocalInventory::where('product_id', $request->product_id[$id])->first();
            $local_inventory->quantity = $local_inventory->quantity - $request->qty[$id];
            $local_inventory->save();

        }

        return redirect()->back()->with('message', 'Shipment Sent.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factory_shipment = FactoryShipment::where('id', $id)->delete();

        return redirect()->route('factory-shipment.index');
    }

    public function messages()
    {
        return [
            'shipment_name.required' => 'A shipment name is required',
            'shipment_creation_date.required'  => 'A shipment creation date is required',
            'shipment_arrival_date.required'  => 'A shipment arrival date is required',
        ];
    }

}
