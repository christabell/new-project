<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Booking;
use Carbon\Carbon;
use App\User;
use App\Room;
use Auth;
use App\Meeting;

class BookingController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); 
    }

    public function index()
    {
        $bookings = Booking::all();
        return $bookings;
       // return view('bookings.index', compact('bookings'));
    }
    
    public function create()
    {
        $booking = Booking::all();
        $count = Booking::count();
        $users = User::getUsers();
        $rooms = Room::getRooms();
        return view('booking.create', compact('users', 'rooms', 'booking', 'count'));

      // return view('bookings');
    }

    public function store(Request $request) {


        //  validate
    $request->validate([
        'room_id'=>'required',
        'title'=>'required',
        'date' => 'required',
        'description'=>'required',
        'start_time'=>'required',
        'end_time'=>'required',
    ]);

        // create meeting

         $meeting = Meeting::create([
            'user_id' => Auth::id(), 
            'room_id' =>request('room_id'),
            'title' =>request('title'), 
            'description' =>request('description'),
        ]);


        // create booking
        Booking::create([
            'meeting_id' => $meeting->id,
            'room_id' => request('room_id'), 
            'date' => Carbon::now(), 
            'start_time' =>request('start_time'), 
            'end_time' =>request('end_time'),       
            'status'=> 1,
        ]);


        // return response

        return redirect()->route('booking.create')->with('success', 'Successfully saved!');
    }
    public function update(Request $input, $id)
    {
        $this->validate($input, [
            'meeting_id'=>'required',
            'room_id'=>'required', 
            'start_time'=>'required',
            'end_time'=>'required',
            'status'=>'required',
            ]);
        $booking = Booking::find($id);
        $booking->meeting_id = $input->meeting_id;
        $booking->room_id = $input->start_time;
        $booking->start_time = $input->start_time;
        $booking->end_time = $input->end_time;
        $booking->status = $input->status;
        // echo $post;
        $booking->save();
        $booking =  bookings::all();
       if (Auth::user()->role=='user'){
                return view('user')->with('bookings', $bookings);
            } elseif (Auth::user()->role=='admin') {
                return view('Admin')->with('bookings', $bookings);
            }
        // echo "string";
    }

    public function edit($id)
    {
        $booking = booking::find($id);
        // return $bookings;
        if (Auth::user()->role=='user'){
                return view('/booking')->with('booking', $booking);
            }else{
                return view('/adminbooking')->with('booking', $booking);
            }
    }

    public function destroy($id)
    {
        $booking = booking::destroy($id);
        return back();
        // return redirect("/mybookings");
        // return view('/mybookings')->with('bookings', $bookings);
    }

    public function getStatus(Room $room)
{
   $booking = Booking::where('room_id',$room->id)->get();
   return response()->json([
       'booking' => $booking
   ]);

   

  // $booking = Booking::find($request->id)->update(['status' => $request->status]);


    // if ($this->end_time->lt(Carbon::today())) {
    //     return 'FINISHED';
    // }

    // if ($this->start_time->lt(Carbon::today()) && $this->end_time->gt(Carbon::today())) {
    //     return 'ONGOING';
    // }
    // return 'UPCOMING';
}

public function browse(Request $request)
    {

        $search = $request->get('search');

        
            $bookings = Booking::where('meeting_id', 'LIKE', '%'.$search.'%')
                            ->orWhere('room_id', 'LIKE', '%'.$search.'%');
    
    	//return view('users', compact('users', 'search'));
    }

}
