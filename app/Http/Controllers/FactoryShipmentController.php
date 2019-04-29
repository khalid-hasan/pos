<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\FactoryShipment;
use App\Factory;

class FactoryShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory_shipments = DB::table('factory_shipments')
        ->join('factories', 'factories.factory_id', '=', 'factory_shipments.factory_id')
        ->select('factory_shipments.*', 'factories.*')
        ->get();

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

        return view('factory-shipment.create')->with('factories', $factories);
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
            'factory_id' => 'required',
            'shipment_name' => 'required',
            'shipment_creation_date' => 'required',
            'shipment_arrival_date' => 'required'
        ]);

        $factory_shipment = new FactoryShipment;

        $factory_shipment->factory_id = $request->factory_id;
        $factory_shipment->shipment_name = $request->shipment_name;
        $factory_shipment->shipment_creation_date = $request->shipment_creation_date;
        $factory_shipment->shipment_arrival_date = $request->shipment_arrival_date;
        $factory_shipment->save();

        return redirect()->back()->with('message', 'Shipment Details Recorded.');
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
            'factory_id.required' => 'A factory name is required',
            'shipment_name.required' => 'A shipment name is required',
            'shipment_creation_date.required'  => 'A shipment creation date is required',
            'shipment_arrival_date.required'  => 'A shipment arrival date is required',
        ];
    }

}
