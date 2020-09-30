<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Room;
use DB;
use Illuminate\Support\Facades\Validator;


class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        //return view('rooms.index', compact('rooms'));
        return $rooms;
    }

    public function store(Request $request)
    {

                // return response()->json($request->file);

                $request->validate([
                    'title'=>'required',
                    'description'=>'required',
                    'seats'=>'required',
                    'file'=>''
                ]);
        
               
                $imageName = $request->file->getClientOriginalName();

        // if ($request->file('image')) {
        //     
        //     return response()->json($imagePath);

  
        //     $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
        //   }
        //   else {
        //       return response()->json([
        //           "status" => "image not uploaded"
        //       ]);
        //   }

        $room = Room::create([
            
        'title' => request('title'),
        'description' => request('description'),
        'seats' => (int)request('seats'),
        'image' => request('file'),

        ]);


        return redirect('createroom')->with('success', 'MeetingRoom saved!');
    }

    public function create()
    {
        $room = Room::all();
        $count = Room::count();
        return view('rooms', compact('room', 'count'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'seats'=>'required',
            'image'=>'required'
        ]);
        $room = Room::find($id);
        $room->title =  $request->get('title');
        $room->description = $request->get('description');
        $room->seats = $request->get('seats');
        $room->image = $request->get('image');
        $room->save();
        return redirect('/rooms')->with('success', 'Room updated!');
    }

    public function browse(Request $request)
    {

        $search = $request->get('search');

        
            $rooms = Room::where('title', 'LIKE', '%'.$search.'%')
                            ->orWhere('description', 'LIKE', '%'.$search.'%');
    
    	//return view('users', compact('users', 'search'));
    }

    // Not in use currently
    public function changeStatus(Request $request)

    {

        $room = Room::find($request->room_id);

        $room->status = $request->status;

        $room->save();

        return response()->json(['success'=>'Available.']);

    }

}
