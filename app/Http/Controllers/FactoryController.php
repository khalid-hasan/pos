<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory;


class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factories = Factory::all();

        return view('factory.index')->with('factories', $factories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('factory.create');
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
            'factory_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $factory = new Factory;

        $factory->factory_name = $request->factory_name;
        $factory->address = $request->address;
        $factory->phone = $request->phone;
        $factory->save();

        return redirect()->back()->with('message', 'Factory Added.');
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
        $factory = Factory::find($id);

        return view('factory.edit')->with('factory', $factory);
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
        request()->validate([
            'factory_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $factory = Factory::find($id);

        $factory->factory_name = $request->factory_name;
        $factory->address = $request->address;
        $factory->phone = $request->phone;
        $factory->save();

        return redirect()->back()->with('message', 'Factory Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factory = Factory::destroy($id);
        return redirect()->route('factory.index');
    }
}
