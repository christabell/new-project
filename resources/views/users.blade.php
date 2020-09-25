@extends('layouts.app')
@section('content')
<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-block btn-danger float-right" style="width:auto;" > Add Users</button>
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card  shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
					
                  </div>
                </div>
              </div>
			  
            </div>
			
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text">List of Users</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>Id</th>
            <th>Name</th>
            <th>Email</th>
			<th>Register</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
		   @foreach($user as $data)
          <tr>
		  <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->created_at->toDateString() }}</td>
          </tr>
              @endforeach
  
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="id01" class="modal">
      
      
      <div class="row justify-content-center float-right " >
         <div class="col-md-10">
         <div class="card">
         <header class="card-header">
             <span onclick="document.getElementById('id01').style.display='none'" class="float-right close " title="Close">×</span>
             
             <h4 class="card-title mt-2">Add New Users</h4>
</header>
	<!-- User form start -->
         <div class="card-body">
			 
		 <form action="{{ route('admin.user.store')}}" method="post">
		 @csrf

<div class="form-group">
            <label>UserName</label>
            <input  type="text" name="name" class="form-control input-btn" placeholder=""required="">
           
        </div> 
        <div class="form-group">
            <label>Email </label>
            <input type="email" name="email" class="form-control input-btn" placeholder=""required="">
           
		</div>  
		<div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control input-btn" placeholder=""required="">
        </div>  
        <div class="form-group">
            <button  type="submit" class="btn btn-block btn-danger">Save</button>
        </div>     
      
    </form>
         </div>

</div>
<!-- user form ends  -->

@endsection