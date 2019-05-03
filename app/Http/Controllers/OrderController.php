<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Product;
use App\Inventory;
use App\OrderDetail;
use App\Order;
use App\CustomerAccount;
use App\CustomerTransaction;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin'))
        {
            abort(404, 'Sorry');
        }

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
                $customer_account= CustomerAccount::where('mobile', $request->mobile)->first();

                if($customer_account && $customer_account->balance > 0)
                {
                    $customer_transaction = new CustomerTransaction;
                    $customer_transaction->order_id = $order_id;
                    $customer_transaction->mobile = $customer_account->mobile;
                    $customer_transaction->current_balance = $customer_account->balance;
                    $customer_transaction->paid_amount = $request->amount[$id];
                    $customer_transaction->date = date('Y-m-d');
                    $customer_transaction->save();

                    $customer_account->balance = $customer_account->balance - $request->amount[$id];
                    $customer_account->save();

                    $payment_method = 'Deducted from Account.';
                }
                else
                {
                    $payment_method = 'Cash Payment';
                }

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
        //dd($customer_account);
        return redirect()->back()->with('message', 'Order Placed.')->with('payment_method', $payment_method);
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

    public function customer_check(Request $request)
    {
        $customer = CustomerAccount::where('mobile', $request->value )->first();

        $details = 
        '<p class="cust_head">Customer Details</p>'.
        '<p class="cust_details">Customer ID: '.$customer->id.'</p>'.
        '<p class="cust_details">Customer Name: '.$customer->customer_name.'</p>'.
        '<p class="cust_details">Customer Mobile: '.$customer->mobile.'</p>'.
        '<p class="cust_details">Customer Balance: '.$customer->balance.'</p>'
        ;

        // $details = 
        // '
        //     <p class="cust_head">Customer Details</p>
        //     <p class="cust_details">Customer ID: $customer->id</p>
        //     <p class="cust_details">Customer Name: $customer->customer_name</p>
        //     <p class="cust_details">Customer Mobile: $customer->mobile</p>
        //     <p class="cust_details">Customer Balance: $customer->balance</p>
        // '
        // ;

        // if($request->value ==  $customer->mobile)
        // {
        //     return response()->json(['success'=> $details]);
        // }
        // else 
        // {
        //     return response()->json(['success'=>'No Customer in the system.']);
        // }

        if($request->value !=  $customer->mobile)
        {
            return response()->json(['success'=>'No Customer in the system.']);
        }
        
        if ($request->value ==  $customer->mobile)
        {
            return response()->json(['success'=> $details]);
        }
    }

}
