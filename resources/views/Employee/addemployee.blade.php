<html>
    <head>
    <title>Add Employee</title>
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
                <h4>Add Employee</h4>
                <a href="{{url('employee')}}" class="btn btn-primary float-right btn-sm">Back</a>
            </div>
            <div class="card-body">
            <form action="{{url('insert_employee')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Employee Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Employee Email" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Employee Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Enter Employee Phone number" value="{{old('phone')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Role</label>
                        <select name="course" id="course" class="form-control">
                            <option value="">----Select Role----</option>
                            <option value="Testing">Testing</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Backend">Backend</option>
                            <option value="HR">HR</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Upload Profile image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="{{old('image')}}" onchange="readURL(this);">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <img id="image1" src="#" alt="No image"  />
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

{{-- <script>
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
  </script> --}}
  <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        jQuery('#image1').removeAttr('src')
        jQuery('#image1').show();



        reader.onload = function (e) {
        $('#image1').attr('src', e.target.result);
        $('#image1').attr('style', "height:200px !important;width:200px !important;");

        }

        reader.readAsDataURL(input.files[0]);
        }
        }
        </script>

