
<html>
    <head>
    <title>Edit Student</title>
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
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
        <br><br><br>
        <div id="success_message"></div>
        <div class="card">
            <div class="card-header">
                Edit Student
                <a href="{{url('employee')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
            <form action="{{url('update_employee')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="student_id" name="student_id" placeholder="Enter Student id" value="{{$employeedetail->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" value="{{$employeedetail->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Employee Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Employee Email" value="{{$employeedetail->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Employee Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Enter Employee Phone number" value="{{$employeedetail->phone_no}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Course</label>
                        <select name="course" id="course" class="form-control">
                            <option value="">----Select Role----</option>
                            <option value="Testing" @if($employeedetail->course=='Testing') selected @endif>Testing</option>
                            <option value="Frontend"  @if($employeedetail->course=='Frontend')selected @endif>Frontend</option>
                            <option value="Backend"  @if($employeedetail->course=='Backend') selected @endif>Backend</option>
                            <option value="HR"  @if($employeedetail->course=='HR') selected @endif>HR</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Upload Profile image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" onchange="readURL(this);">
                            <input type="hidden" class="form-control-file" id="oldimage" name="oldimage" value ="{{$employeedetail->image}}"  >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @if ($employeedetail->image!='' && $employeedetail->image!='no file')
                            <img id="u_file" src="{{asset('images/'.$employeedetail->image)}}" width="200px" height="200px" alt="image"  />
                            <a href="{{asset('images/'.$employeedetail->image)}}" download>Download</a>
                            @endif
                        </div>
                    </div>
                </div>
                    <button id="test-element" type="submit" class="btn btn-primary save">Submit</button>
            </form>
            </div>
          </div>

    </body>
</html>


<script>
$("#test-element").on("click",function() {
        // var data=$("form").serialize()
        // alert(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            data:$("form").serialize(),
            dataType   :'json',
            success:function(result)
            {
                //console.log(result);
                // alert(result);
                $('#success_message').html(result.msg);
            }});
    });
</script>

<script>
    //this script is for toastr message for error validation
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    jQuery('#u_file').removeAttr('src')
    jQuery('#u_file').show();
    reader.onload = function (e) {
    $('#u_file').attr('src', e.target.result);
    $('#u_file').attr('style', "height:200px !important;width:200px !important;");
    }
    reader.readAsDataURL(input.files[0]);
    }
    }
    </script>

