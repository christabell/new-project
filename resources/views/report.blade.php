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
    <div class="container mt-5">
        <h2 class="text-center mb-3">Meeting Report</h2>

        <div class="d-flex justify-content-end mb-4"> 
        <!-- {{ url('create') }} -->
            <a class="btn btn-primary" href="{{ URL::to('report') }}">Export to PDF</a>
        </div>

        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">#</th>
                    <th scope="col">Organiser</th>
                    <th scope="col">Room</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meetings as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->user_id }}</td>
                    <td>{{ $data->room_id }}</td>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>