@extends('layouts.master')

@section('title')
    Admin | New Sport
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>New Organization/Society</h2>
            <form action="{{route('sports.add-new-sport')}}" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name of the Sport: (*)</label>
                    <input type="text" class="form-control" name="name" id="name">
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

        if(name == null || name === ""){
            alert("Sport Name cannot be empty");
            valid = false;
            return false;
        }

        if(valid){
            return confirm("Are you sure you want to add this sport ?");
        }else{
            return false;
        }
    }

</script>
@endpush