@extends('layouts.master')

@section('title')
    Admin | New Organization/Society
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>New Organization/Society</h2>
            <form action="{{route('organizations.add-new-organization')}}" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name of the Society/Organization: (*)</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="logo">Organization Logo (jpg/png only): (*)</label>
                    <input type="file" class="form-control" name="logo" id="logo">
                </div>

                <div class="form-group">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop

@push('scripts')
<script type="text/javascript">
    function validateForm(){
        var valid = true;

        var name = document.getElementById("name").value;
        var file = $('#logo').val().split('.').pop().toLowerCase();

        if(name == null || name === ""){
            alert("Organization Name cannot be empty");
            valid = false;
            return false;
        }

        if(file == "" || file == null){
            alert("Organization Logo cannot be empty");
            valid = false;
            return false;
        }else if(!( file === "png")){
            alert("Only add images of type png");
            valid = false;
            return false;
        }

        if(valid){
            return confirm("Are you sure you want to add this organization ?");
        }else{
            return false;
        }
    }

</script>
@endpush