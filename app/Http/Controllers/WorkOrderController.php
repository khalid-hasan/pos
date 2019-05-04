<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Factory;
use App\WorkOrder;
use App\RawMaterial;
use App\LocalInventory;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_orders = DB::table('work_orders')
            ->join('factories', 'factories.factory_id', '=', 'work_orders.factory_id')
            ->join('products', 'products.product_id', '=', 'work_orders.product_id')
            ->select('products.name', 'products.product_id', 'factories.factory_name', 'work_orders.*')
            ->get();


        return view('work-order.index')->with('work_orders', $work_orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $raw_materials = RawMaterial::all();
        $products = Product::all();
        $factories = Factory::all();

        return view('work-order.create')->with('products', $products)->with('factories', $factories)->with('raw_materials', $raw_materials);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work_order = new WorkOrder;
        $work_order->factory_id = $request->factory_id;
        $work_order->product_id = $request->product_id;
        $work_order->product_quantity = $request->product_quantity;
        $work_order->raw_material_total_price = 0;
        $work_order->remaining_quantity = $request->product_quantity;
        $work_order->received_quantity = 0;

        for($id = 0; $id < count($request->material_id); $id++){
            $total = $request->qty[$id] * $request->price[$id];
            $work_order->raw_material_total_price = $work_order->raw_material_total_price + $total;
        }

        $work_order->status = 'Pending';
        $work_order->save();

        return redirect()->back()->with('message', 'Order Placed.');
    }

    public function receive(Request $request)
    {
        $work_order = WorkOrder::where('id', $request->work_id)->first();
        $work_order->received_quantity = $request->received_quantity;
        $work_order->remaining_quantity = $work_order->product_quantity - $request->received_quantity;
        $work_order->status = 'Received';
        $work_order->save();

        $inventory = new LocalInventory;
        $inventory->product_id = $request->product_id;
        $inventory->quantity = $request->received_quantity;
        $inventory->save();

        return redirect()->route('work-order.index');
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
        $work_order = WorkOrder::find($id);
        $work_order->delete();  

        return redirect()->route('work-order.index');
    }
}
