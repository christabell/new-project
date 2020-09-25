<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Room;

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
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'seats'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        return $request->all();

        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
  
            $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
          }
        $room = new Room([
            
        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'seats' => $request->get('seats'),
        'image' => $imageName,
        ]);
        $room->save();
        return redirect('/rooms')->with('success', 'MeetingRoom saved!');
    }

    public function create()
    {
        return view('createroom');
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
