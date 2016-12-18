@extends('layouts.master')

@section('title')
    Student | New Activity | Competition
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Activity (Competitions)</h2>
            <form action="{{route('competitions.add-new-competition-activity')}}" method="post" onsubmit="return validateForm()">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Competition Name: (*)</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="status">Status (Winner/1st Runner-up/2nd Runner-up/Participation etc): (*)</label>
                    <input type="text" name="status" class="form-control" id="status">
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date: (*)</label>
                    <input type="date" name="start_date" class="form-control" id="start_date">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date or Present: (*)</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="end_date" id="end_date">
                        </div>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="end_date" id="end_date_option">Present</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="effort">Effort in hours (daily/weekly): (*)</label>
                    <input type="number" class="form-control" name="effort" id="effort">
                </div>

                <div class="form-group">
                    <label for="description">Description: (*)</label>
                    <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                </div>

                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
            alert("Competition Name cannot be empty");
            valid = false;
            return false;
        }

        var status = document.getElementById("status").value;
        if(status == null || status === ""){
            alert("Competition Status cannot be empty");
            valid = false;
            return false;
        }

        var start_date = document.getElementById("start_date").value;
        if(start_date === ""){
            alert("Start Date cannot be empty");
            valid = false;
            return false;
        }

        var end_date_option = document.getElementById("end_date_option").checked;
        var end_date = document.getElementById("end_date").value;

        if(!(end_date_option) && end_date===""){
            alert("Add End Date or Mark as Present");
            valid = false;
            return false;
        }else if(end_date_option && !(end_date==="")) {
            alert("Cannot mark Present and add a End Date");
            valid = false;
            return false;
        }else if(!(end_date_option) && !(end_date==="")){
            var endDate=new Date(end_date);
            var startDate=new Date(start_date);

            if(startDate>endDate){
                alert("End Date cannot be before Start Date");
                valid=false;
                return false;
            }
        }


        var effort = document.getElementById("effort").value;

        if(effort == null || effort === ""){
            alert("Effort field cannot be empty");
            valid = false;
            return false;
        }else if(effort<=0 ){
            alert("Effort hours cannot be zero or negative");
            valid = false;
            return false;
        }

        var description = document.getElementById("description").value;
        if(description == null || description === ""){
            alert("Description field cannot be empty");
            valid = false;
            return false;
        }

        if(valid){
            return confirm("Are you sure you want to add this activity ?");
        }else{
            return false;
        }
    }

</script>
@endpush
