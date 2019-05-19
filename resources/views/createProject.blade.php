@extends('layouts.main')

@section('navExtention')
@parent
<span class="nav-title ml-4">Create a project</span>
@stop
@section('mainContent')
@parent

<div id="createProject" class="col s12 m-8">
    <div class="row">

        <form id="createProjectForm" class="col s12" action="/projects" method="POST">
            @csrf
            <div class="col s12 l6">
                <h5>Project Info</h5>

                <div class="input-field col s12">
                    <input id="projectTitle" type="text" name="title" class="validate">
                    <label for="projectTitle">Project Title</label>
                </div>
                <div class="input-field col s12">
                        <textarea name="description" id="projectDescription" class="materialize-textarea"></textarea>
                        <label for="projectDescription">Description</label>
                      </div>
                <div class="input-field col s6">
                    <select name="rate_type">
                        <option value="" disabled selected>Select rate type</option>
                        <option value="1">Hourly</option>
                        <option value="2">Flat</option>
                        <option value="0">None</option>
                    </select>
                    <label>Rate Type</label>
                </div>
                <div class="input-field col s6">
                    <input name="rate_amount" id="projectRateAmount" type="number" class="validate">
                    <label for="projectRateAmount">Rate Amount</label>
                </div>
                <div class="input-field col s12">
                    <div class="chips">
                        <input name="tags" placeholder="Tags" class="custom-class" id="projectTags">
                    </div>
                </div>

            </div>
            <div class="col s12 l6">

                <h5>Client Info</h5>
                <div class="input-field col s6">
                    <input id="clientFirstName" type="text" class="validate">
                    <label for="clientFirstName">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="clientLastName" type="text" class="validate">
                    <label for="clientLastName">Last Name</label>
                </div>

                <div class="input-field col s6">
                    <input id="clientEmailAddress" type="email" class="validate">
                    <label for="clientEmailAddress">Email Address</label>
                </div>
                <div class="input-field col s6">
                    <input id="clientPhoneNumber" type="text" class="validate">
                    <label for="clientPhoneNumber">Phone Number</label>
                </div>
            </div>
        </form>
        <br/>
        <button type="submit" form="createProjectForm" value="Submit" class="waves-effect waves-light btn w-full sm:w-full md:w-full lg:w-1/2">Create</button>

    </div>
</div>

@stop

<script>
    document.addEventListener('DOMContentLoaded', function() {
              var elems = document.querySelectorAll('.datepicker');
              var instances = M.Datepicker.init(elems, options = null);
              var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, options = null);
                var elems = document.querySelectorAll('.chips');
    var instances = M.Chips.init(elems, options = null);

        });
</script>
