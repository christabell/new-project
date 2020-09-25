<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CollaboratorsController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->select('id','name','email')->get();
        return response()->json([
            'users' => $users]);
      
        //return view('some-view')->with('users', $users);
        // add the view blade file in "some-view"
    }
    
    

    public function destroy($id)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->delete();
       
    }
}
