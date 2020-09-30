@extends('layouts.app')
@section('content')



<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-block btn-danger float-right" style="width:auto;" > Create Room</button>
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card  shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold mb-1">Total Rooms</div>
                      <div class="h5 mb-0 font-weight-bold text-800">{{$count}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-home fa-2x text-300"></i>
                    </div>
					
                  </div>
                </div>
              </div>
			  
            </div>
			
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text">Smartcodes Meeting Rooms</h6>
  </div>
  
 

            <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="images/Rectangle 11.svg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Madison Square</h5>
      <p><i class="fa fa-users mr-4"></i>10 seats</p>
     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, earum.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="images/Rectangle 33.svg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Wall Street</h5>
      <p><i class="fa fa-users mr-4"></i>15 seats</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, delectus!</p>
    </div>
  </div>
 
</div>
    </div>
  </div>
</div>

<div id="id01" class="modal">
      
      
      <div class="row justify-content-center float-right " >
         <div class="col-md-10">
         <div class="card">
         <header class="card-header">
             <span onclick="document.getElementById('id01').style.display='none'" class="float-right close " title="Close">×</span>
             
             <h4 class="card-title mt-2">Create Room</h4>
</header>
<body> 
	<!-- User form start -->
    @if(session('status'))
    <h4> {{session('status')}}</h4>
    @endif

	<form action="{{ url('createroom') }}" method="post"  enctype="multipart/form-data">
		@csrf
  <div class="card-body">
              <div class="form-group mt-4 py-4">
                <label for="meeting title">Room Name</label>
                <input  name="title"type="text" class="form-control input-btn" placeholder="eg. Madson Avenue">
              </div>
              
              <div class="form-row ">
                <div class="form-group mr-3">
                  <label for="choose meeting">Capacity</label>
                  <input name="seats" type="text" class="form-control" placeholder="eg. 9 seats">
                  
                 
                </div>
                <div class="form-group col-md-5">
                  <label for="">Room Image</label>
                <div class="input-group">
                <input type="file" name="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" >
            
            @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-cloud-upload-alt"></i></div>
                    </div>
            @endif
                    
                </div>
                </div>
               
              </div>
        
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"  rows="6"></textarea>
              </div>
                
            
        <div class="form-group">
            <button  type="submit" class="btn btn-block btn-danger">Save</button>
        </div>     
        </div>
    <form/>
         
          </body>
        
<!-- user form ends  -->

@endsection