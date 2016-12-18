@extends('layouts.master')

@section('title')
    Student | New Activity | Achievement
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Activity (Achievement)</h2>
            <form action="{{ route('achievements.add-new-achievement') }}" method="post" onsubmit="return validateForm()">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Achievement Name: (*)</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <label>Time Duration or No Time Duration: (*)</label>
                <br>
                <div class="row">
                    <div class="form-group" style="padding-left: 30px">
                        <label for="start_date" style="font-size: 13px">Start Date:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" name="start_date" class="form-control" id="start_date">
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label style="font-size: 13px; font-weight: bold"><input type="checkbox" value="1" name="no_time" id="no_time">No Time Duration</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" style="padding-left: 30px">
                        <label for="end_date" style="font-size: 13px">End Date or Present:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="end_date" id="end_date_option">Present</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="effort">Effort in hours (weekly/daily): (*)</label>
                    <input type="number" class="form-control" name="effort" id="effort">
                </div>

                <div class="form-group">
                    <label for="description">Description: (*)</label>
                    <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                </div>
                <br>
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
            alert("Achievement Name cannot be empty");
            valid = false;
            return false;
        }

        var no_time = document.getElementById("no_time").checked;
        var start_date = document.getElementById("start_date").value;
        var end_date_option = document.getElementById("end_date_option").checked;
        var end_date = document.getElementById("end_date").value;

        if(!(no_time)){
            if(start_date === ""){
                alert("Start Date cannot be empty");
                valid = false;
                return false;
            }

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
        }else{
            if(end_date_option || !(end_date==="") || !(start_date=="")){
                alert("If No Time Duration, time fields cannot be filled");
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