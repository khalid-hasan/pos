<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RawMaterial;
use App\Factory;


class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw_materials = DB::table('raw_materials')
        ->join('factories', 'factories.factory_id', '=', 'raw_materials.factory_id')
        ->select('raw_materials.*', 'factories.*')
        ->get();

        return view('raw-material.index')->with('raw_materials', $raw_materials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factories = Factory::all();

        return view('raw-material.create')->with('factories', $factories);
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
            'material_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'production_type' => 'required',
            'assign_date' => 'required',
        ]);

        $raw_material = new RawMaterial;

        $raw_material->factory_id = $request->factory_id;
        $raw_material->material_name = $request->material_name;
        $raw_material->quantity = $request->quantity;
        $raw_material->price = $request->price;
        $raw_material->production_type = $request->production_type;
        $raw_material->assign_date = $request->assign_date;
        $raw_material->save();

        return redirect()->back()->with('message', 'Raw Materials Added.');
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
        $factory = RawMaterial::destroy($id);
        return redirect()->route('raw-material.index');
    }

    public function messages()
    {
        return [
            'factory_id.required' => 'A factory name is required',
            'material_name.required' => 'A material name is required',
            'production_type.required'  => 'A production type is required',
            'assign_date.required'  => 'A assign date is required',
        ];
    }
}
