<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::all();
        return $bookings;
       // return view('bookings.index', compact('bookings'));
    }
    
    public function create()
    {
       return view('bookings');
    }

    public function store(Request $request) {

   
    // $rule = [ 
    //     'room_id'=>'required',
    //     "meeting_id" => "required", 
    //     "meeting_room" => "required",
    //     "start_time" => "required",
    //     "end_time" => "required",
    //     "status" => "required",
    //     ];

    //     $this->validate($request , $rule); 
    //     echo "string";
        $booking = new bookings;   
        $booking->user_id = Auth::user()->id;      
        
        //'meeting_id' => $request->get('meeting_id'),
       
        $booking->room_id = $request->room_id; 
        $booking->meeting_id = $request->meeting_id;
        $booking->start_time = $request->start_time; 
        $booking->end_time = $request->end_time;       
        $booking->meeting_date = $request->meeting_date;  
        $booking->status = $request->status;  
       // $booking->status = Auth::user()->name;
        

        $booking->save();                   

        return back('/bookings')->with('success', 'Successfully saved!');
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
        $booking->start_time = $input->start_time;
        $booking->end_time = $input->end_time;
        $booking->status = $input->status;
        // echo $post;
        $booking->save();
        $bookings =  bookings::all();
       if (Auth::user()->role=='user'){
                return view('user')->with('bookings', $bookings);
            } elseif (Auth::user()->role=='admin') {
                return view('Admin')->with('bookings', $bookings);
            }
        // echo "string";
    }

    public function edit($id)
    {
        $booking = bookings::find($id);
        // return $bookings;
        if (Auth::user()->role=='user'){
                return view('/booking')->with('booking', $booking);
            }else{
                return view('/adminbooking')->with('booking', $booking);
            }
    }

    public function destroy($id)
    {
        $bookings = bookings::destroy($id);
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
