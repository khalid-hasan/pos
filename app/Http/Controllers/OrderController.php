<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Inventory;
use App\OrderDetail;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'order_details.product_id', '=', 'products.product_id')
            ->select('products.name', 'orders.*', 'order_details.*')
            ->get();


        return view('order.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        $products = Product::where('status', 'In Stock')->get();
        //$products = Product::all();
        $orders = OrderDetail::all();
        return view('order.create')->with('products', $products)->with('orders', $orders)->with('orderby', $orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = new Order;
        $order->customer_name = $request->name;
        $order->mobile = $request->mobile;
        $order->save();
        $order_id = $order->id;
        if($order_id > 0)
        {
            for($id = 0; $id < count($request->product_id); $id++){
                $inventory = Inventory::where('product_id', $request->product_id[$id])->first();
                $order_details = new OrderDetail;
                $order_details->order_id = $order_id;
                $order_details->product_id = $request->product_id[$id];
                $order_details->quantity = $request->qty[$id];
                $inventory->quantity = $inventory->quantity - $request->qty[$id];
                $order_details->unitprice = $request->price[$id];
                $order_details->discount = $request->dis[$id];
                $order_details->total = $request->amount[$id];
                $order_details->added_by = session('uname');
                $inventory->save();
                $order_details->save();
            }
            
        }

        return redirect()->back()->with('message', 'Order Placed.');
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
        $order = OrderDetail::find($id);
        $order->delete();  

        return redirect()->route('order.index');
    }
}
