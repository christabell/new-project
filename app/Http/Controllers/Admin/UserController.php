<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;


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
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $count = User::count();
        return view('users', compact('user', 'count'));
    //    return view('users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate user
        $request->validate([
           'name'  => 'required|string|max:255',
            'email'  => 'required|email|max:255|unique:users',
            'password' =>  'required' 

        ]);

        // create user
         $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
         ]);

        // return response
            // return $user;

            return view('users')->with('user',$user);
            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users')->with('user',$user);        
    
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
        //valiadte
        {
            $request->validate([
                'name'  => 'required|string|max:255',
                'email'  => 'required|email|max:255|unique:users',
                'password' =>  'required' 
            ]);
             
            $user = User::find($id);
            $user->name =  $request->get('name');
            $user->email =  $request->get('email');
            $user->save();
            return $user;
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           // User::find($id)->delete();       
            $user = User::find($id);
            $user->delete();
            return redirect('/users')->with('success', 'User deleted successfully!');
    }
}
