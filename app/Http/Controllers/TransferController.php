<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TransferredInToBd;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = TransferredInToBd::all();

        return view('transfer.index')->with('transfers', $transfers);
    }

    public function index_bd()
    {
        $transfers = TransferredInToBd::all();

        return view('transfer-bd.index')->with('transfers', $transfers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transfer.create');
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
            'amount' => 'required',
        ]);

        $transfer = new TransferredInToBd;

        $transfer->amount = $request->amount;
        $transfer->status = 'Sent';
        $transfer->sender_name = session('uname');
        $transfer->save();

        return redirect()->back()->with('message', 'Money Sent.');
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
        $tranfer= TransferredInToBd::destroy($id);
        return redirect()->route('transfer.index');
    }

    public function receive($id)
    {
        $transfer= TransferredInToBd::where('id', $id)->first();

        $transfer->status = 'Received';
        $transfer->receiver_name = session('uname');
        $transfer->save();

        return redirect()->route('transfer-bd.index');
    }

    public function undo($id)
    {
        $transfer= TransferredInToBd::where('id', $id)->first();

        $transfer->status = 'Sent';
        $transfer->save();
        
        return redirect()->route('transfer-bd.index');
    }
}
