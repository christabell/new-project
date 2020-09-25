<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use PDF;
use App\User;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return $meetings;
        //return view('meetings, compact('contacts'));
        //return view('meetings', ['meetings'=>$meetings])
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'room_id'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]);
        $meeting = new Meeting([
            'user_id' => $request->get('user_id'),
            'room_id' => $request->get('room_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
        $meeting->save();
        return redirect('/meetings')->with('success', 'Successfully saved!');
    }
        public function create()
        {
            $users = User::getUsers();
            $rooms = Room::getRooms();
            return view('meetings.create', compact('users', 'room'));
        }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=>'required',
            'room_id'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]);
        $meeting = Meeting::find($id);
        $meeting->user_id =  $request->get('user_id');
        $meeting->room_id = $request->get('room_id');
        $meeting->title = $request->get('title');
        $meeting->description = $request->get('description');
        $meeting->save();
        return redirect('/meetings')->with('success', 'Meeting updated!');
    }

    public function showReport(){
        $meetings = Meeting::all();
        return view('report', compact('meetings'));
      }

      // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Meeting::all();
  
        // share data to view
        view()->share('meeting',$data);
        $pdf = PDF::loadView('pdf_view', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }

    public function delete($id){
        
        Meeting::where('id',$id)->deleted();
        return "Meeting deleted successfully";
    }
}
