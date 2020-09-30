@extends('layouts.app')
@section('content')
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card  shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold mb-1">Total Meetings</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
					
                  </div>
                </div>
              </div>
			  
            </div>

			
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text">Total Meetings</h6>
   
    <div class="d-flex flex-row-reverse">
  <div class="p-2"><button onclick="document.getElementById('id01').style.display='block'" class="btn btn-block btn-danger float-right" style="width:auto;" >Book Meeting</button></div>
  <div class="p-2"><select class="form-control form-control-sm">
  <option>Time</option>
</select></div>
  <div class="p-2"><select class="form-control form-control-sm">
  <option>Meetings</option>
</select></div>
</div>
 

  </div>
  
<div class="card-deck">
  <div class="card">

    <div class="card-body">
    <h5 class="card-title">Beki Tatu Presentation</h5>
                      
                      
                      <p class="Lead">Madison Square </p>
                      <p class="Lead">Time:1:00-6:00 </p><br>
                      <p class="card-text">Organizer:hussien</p>
                      <button  class="text-white btn btn-block btn-danger">View More</button>
    </div>
  </div>
  <div class="card">

    <div class="card-body">
    <h5 class="card-title">Beki Tatu Presentation</h5>
                      
                      
                      <p class="Lead">Madison Square </p>
                      <p class="Lead">Time:1:00-6:00 </p><br>
                      <p class="card-text">Organizer:hussien</p>
                      <button class="text-white btn btn-block btn-danger">View More</button>
    </div>
    </div>
    <div class="card">

<div class="card-body">
<h5 class="card-title">Beki Tatu Presentation</h5>
                  
                  
                  <p class="Lead">Madison Square </p>
                  <p class="Lead">Time:1:00-6:00 </p><br>
                  <p class="card-text">Organizer:hussien</p>
                  <button class="text-white btn btn-block btn-danger">View More</button>
</div>
</div>
 
</div>

<div id="id01" class="modal">
      
      
      <div class="row justify-content-center float-right " >
         <div class="col-md-10">
         <div class="card">
         <header class="card-header">
             <span onclick="document.getElementById('id01').style.display='none'" class="float-right close " title="Close">×</span>
             
             <h4 class="card-title mt-2">Book Meeting</h4>
</header>
<body> 
	<!-- User form start -->
         <div class="card-body">
			 
         <form action="{{ route('booking.store') }}" method="post"  enctype="multipart/form-data">
         @csrf
              <div class="form-group mt-4 py-4">
                <label for="title">Meeting Title</label>
               
                <input name="title"type="text" class="form-control" required>
              </div>

              <div class="form-row ">
                <div class="form-group mr-2">
                  <label for="choose meeting">Choose Meeting Room</label>
                  <select name="room_id">
                @foreach($rooms as $item)
              <option value="{{ $item->id }}">{{ $item->title }}</option>
              @endforeach
              
            </select>
                </div>
                <div class="form-group col-md-3 mr-3">
                  <label for="">Starting Time</label>
                  <div class="form-control datetime" id="datetimepicker6" data-target-input="nearest">
                    <input type="time" name="start_time" class="form-control datetime" value="start_time" data-target="#datetimepicker6"/>
                    <div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="">End Time</label>
                  <div class="form-control datetime" id="datetimepicker7" data-target-input="nearest">
                    <input type="time" name="end_time" class="form-control datetime" value="end_time " data-target="#datetimepicker7"/>
                    <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                </div>
              </div>
        
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"  rows="6"></textarea>
              </div>

              <input type="text" name="date" value="30-09-2020">
                
            <span><h4>Add Members<i class="fa fa-user-plus mr-3" style="color: red;"></i>
            <select>
                @foreach($users as $user)
                <option value="{{$user->id}}" {{in_array($user->id, old("users") ?: []) ? "selected": ""}}>{{$user->name}}</option>

              <!-- <option value="{{ $user->id }}">{{ $user->name }}</option> -->
              @endforeach
              
            </select>
            </h4></span>
        <div class="form-group">
            <button  type="submit" class="btn btn-block btn-danger">Save</button>
        </div>     
      
    </form>
         </div>

</div>  
</body>        
			

@endsection