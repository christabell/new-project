

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    @if(session('status'))
    <h4> {{session('status')}}</h4>
    @endif

	<form action="{{ route('meeting.store') }}" method="post">
		@csrf
    <div class="form-group">
        <label>Room Name</label>
        <input  name="title"type="text" class="form-control input-btn" placeholder="eg. Madson Avenue">
                
     </div>

     <div class="row">
          <div class="col-md-4">
             <label>Capacity</label>
             <input  name="seats" type="text" class="form-control input-btn" placeholder="eg.9 ">
          </div>

          <div class="col-md-4">
             <label>Room Image</label>
             <input type="file" name="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" >
            
          @if ($errors->has('file'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('file') }}</strong>
              </span>
          @endif
          </div>

     </div>

      <div class="col md-4">
          <label>Description</label>
          <input name="description" type="text" class="form-control input-btn" placeholder="eg.location of the room">
      </div>

      <div class="form-group">
                 <button  type="submit" class="btn btn-block btn-primary">Save</button>
      </div>  

</form>
</body>
</html>

