<html>
    <head>
        <title>Student List</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Employee List Data</h4>
                            <a href="{{url('add_employee')}}" class="btn btn-primary float-right btn-sm">Add Emloyee</a>
                        </div>
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Employee Name</th>
                            <th>Employee Email</th>
                            <th>Employee Phone</th>
                            <th>Employee Course</th>
                            <th>Employee Profile</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list_Employee as $index=>$row)
                        <tr>
                            <td>{{$index+1;}}</td>
                            <td>{{$row['name']}}</td>
                            <td>{{$row['email']}}</td>
                            <td>{{$row['phone_no']}}</td>
                            <td>{{$row['course']}}</td>
                            <td>
                                @if($row['image'])
                                <img src="{{asset('images/'.$row['image'])}}" height="100" width="100" alt="image">
                                <a href="{{asset('images/'.$row['image'])}}" download>Download</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('edit_employee')}}/{{$row['id']}}" class="btn btn-warning">Edit</a>
                                <a href="{{url('delete_employee')}}/{{$row['id']}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{-- {{$list_student->links()}} --}}
                </div>
            </div>
        </div>
    </body>
</html>


<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>

