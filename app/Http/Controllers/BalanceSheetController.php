<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Factory;
use App\WorkOrder;
use App\TransferredInToBd;

class BalanceSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = DB::table('work_orders')
            ->join('factories', 'factories.factory_id', '=', 'work_orders.factory_id')
            ->select('factories.factory_name', 'work_orders.*')
            ->get();

        $transfers = TransferredInToBd::where('status', 'Received')->get();

        $total_expenses = 0;
        foreach ($expenses as $expense) {
            $total_expenses = $total_expenses + $expense->raw_material_total_price;
        }

        $total_money = 0;
        foreach ($transfers as $transfer) {
            $total_money = $total_money + $transfer->amount;
        }


        return view('balance-sheet.index')->with('expenses', $expenses)->with('transfers', $transfers)->with('total_expenses', $total_expenses)->with('total_money', $total_money);
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
        //
    }
}
