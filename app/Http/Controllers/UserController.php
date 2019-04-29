<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'user_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
            'residence' => 'required',
            'role' => 'required'
        ]);

        $user = new User;

        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->residence = $request->residence;
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('message', 'User Added.');
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
        $user = User::where('user_id', $id)->first();
        return view('user.edit')->with('user', $user);
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
            'user_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'residence' => 'required',
            'role' => 'required'
        ]);

        $user = User::where('user_id', $id)->first();;

        if($request->password == "")
        {
            $user->user_id = $request->user_id;
            $user->name = $request->name;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->residence = $request->residence;
            $user->role = $request->role;
            $user->save();            
        }
        else
        {
            $user->user_id = $request->user_id;
            $user->name = $request->name;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->residence = $request->residence;
            $user->role = $request->role;
            $user->save();
        }


        return redirect()->back()->with('message', 'User Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('user_id', $id)->delete();
        return redirect()->route('user.index');
    }
}
