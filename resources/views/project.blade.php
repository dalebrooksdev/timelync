<style>
    .timeline {
        position: relative;
    }

    .timeline .timeline-event {
        position: relative;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .timeline .timeline-event .timeline-content {
        position: relative;
        width: calc(50% - 50px);
    }

    .timeline .timeline-event::before {
        display: block;
        content: "";
        width: 2px;
        height: calc(50% - 30px);
        position: absolute;
        background: #d2d2d2;
        left: calc(50% - 1px);
        top: 0;
    }

    .timeline .timeline-event::after {
        display: block;
        content: "";
        width: 2px;
        height: calc(50% - 30px);
        position: absolute;
        background: #d2d2d2;
        left: calc(50% - 1px);
        top: calc(50% + 30px);
    }

    .timeline .timeline-event:first-child::before {
        display: none;
    }

    .timeline .timeline-event:last-child::after {
        display: none;
    }

    .timeline .timeline-event:nth-child(even) .timeline-content {
        margin-left: calc(50% + 50px);
    }

    .timeline .timeline-event:nth-child(odd) .timeline-content {
        margin-left: 0;
    }

    .timeline .timeline-badge {
        display: block;
        position: absolute;
        width: 40px;
        height: 40px;
        background: #d2d2d2;
        top: calc(50% - 20px);
        right: calc(50% - 20px);
        border-radius: 50%;
        text-align: center;
        cursor: default;
    }

    .timeline .timeline-badge i {
        font-size: 25px;
        line-height: 40px;
    }

    @media (max-width: 600px) {
        .timeline .timeline-event .timeline-content {
            width: calc(100% - 70px);
        }

        .timeline .timeline-event::before {
            left: 19px;
        }

        .timeline .timeline-event::after {
            left: 19px;
        }

        .timeline .timeline-event:nth-child(even) .timeline-content {
            margin-left: 70px;
        }

        .timeline .timeline-event:nth-child(odd) .timeline-content {
            margin-left: 70px;
        }

        .timeline .timeline-badge {
            left: 0;
        }
    }
</style>
@extends('layouts.main')

@section('navExtention')
@parent
<span class="nav-title ml-4">{{$userProject->title}}</span>
<ul class="tabs tabs-transparent" id="projectTabs">
    <li class="tab"><a href="#timeTracker">Time Tracker</a></li>
    <li class="tab"><a href="#projectSettings">Settings</a></li>

</ul>

@stop
@section('mainContent')
@parent
@if ($errors->any())
<div class="row m-4 justify-center">
    <div class="col s6">
        <div class="card-panel red">
            <span class="white-text">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </span>
        </div>
    </div>
</div>
@endif

<div id="timeTracker" class="col s12">

    <div class="row p-4">

        <div class="col s12 m6">
            @if($inProgressTask)
            <div class="card">
                <div class="card-content">
                    <span class="card-title">You are currently working on a task.</span>
                    <div class="row mb-0">
                        @foreach($inProgressTask as $task)
                        <b>Description: </b>{{$task->description}}
                        @endforeach
                    </div>
                </div>
                <div class="card-action">
                    <form id="endTrackedTaskForm" action="/timestamps" method="POST">
                        @csrf
                        @foreach($inProgressTask as $task)
                        <input name="timestamp_id" type="hidden" value="{{$task->id}}">
                        @endforeach
                        <input name="task_type" type="hidden" value="tracked_end">
                        <input name="project_id" value="{{$userProject->id}}" type="hidden">
                    </form>
                    <button class="btn-floating btn-large waves-effect waves-light red darken-1" type="submit"
                        form="endTrackedTaskForm" value="Submit"><i class="large material-icons">stop</i></button>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Start a new task</span>
                    <div class="row mb-0">
                        <form id="createTrackedTaskForm" action="/timestamps" method="POST">
                            @csrf
                            <input name="task_type" type="hidden" value="tracked">
                            <input name="project_id" value="{{$userProject->id}}" type="hidden">

                            <div class="input-field col s12">
                                <input name="description" id="taskDescription" type="text" class="validate">
                                <label class="active" for="taskDescription">What are you working on?</label>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-action">

                    <button class="btn-floating btn-large waves-effect waves-light light-blue darken-1" type="submit"
                        form="createTrackedTaskForm" value="Submit"><i
                            class="large material-icons">play_arrow</i></button>
                </div>
            </div>
            @endif

        </div>

        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Enter a manual task</span>
                    <div class="row mb-0">

                        <form id="createManualTaskForm" class="col s12" action="/timestamps" method="POST">
                            @csrf
                            <div class="input-field col s12">
                                <input id="taskDescriptionManual" type="text" name="description" class="validate">
                                <label class="active" for="taskDescriptionManual">What did you work on?</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" class="datepicker" name="start_date" id="startDate">
                                <label class="active" for="startDate">Start date</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" class="datepicker" name="end_date" id="endDate">
                                <label class="active" for="endDate">End date</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" class="timepicker" name="start_time" id="taskTimeStart">
                                <label class="active" for="taskTimeStart">Start time</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" class="timepicker" name="end_time" id="taskTimeEnd">
                                <label class="active" for="taskTimeEnd">End time</label>
                            </div>
                            <input name="project_id" value="{{$userProject->id}}" type="hidden">
                        </form>

                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" form="createManualTaskForm" value="Submit"
                        class="btn-floating btn-large waves-effect waves-light light-blue darken-1"><i
                            class="large material-icons">add</i></button>
                </div>
            </div>

        </div>

        <div class="col s12">
            <div class="center-align">
                <h3>Timeline</h3>
                <b>Current Time Spent: </b>{{$totalTimeSpent}}
                <br />
                @if ($userProject->timestamp->first())
                <b>Billable: </b> {{$userProject->timestamp->first()->getTotalCharges($userProject->id)}}
                @endif
            </div>
            <div class="container">
                <div class="timeline">
                    @foreach ($userProject->timestamp as $timestamp)
                    <div class="timeline-event">
                        <div class="card timeline-content">
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">{{$timestamp->start_date}}
                                    <form id="deleteTimestampForm-{{$timestamp->id}}" action="/timestamps"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input name="timestamp_to_delete" type="hidden" value="{{$timestamp->id}}">
                                    </form>
                                    <button class="float-right" type="submit"
                                        form="deleteTimestampForm-{{$timestamp->id}}" value="Submit">
                                        <i class="material-icons right">delete</i></button>
                                </span>

                                <p class="pb-4">{{$timestamp->description}}</p>
                                <p><b>Duration:</b> {{$timestamp->getDuration($timestamp->id)}} </p>
                            </div>
                        </div>
                        <div class="timeline-badge blue white-text"><i class="material-icons">assignment</i></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<div id="projectSettings" class="col s12">
    <div class="row p-4">
        <h4>Project Settings</h4>
        <div class="p-4">
            <form id="deleteProjectForm-{{$userProject->id}}" action="/projects" method="POST">
                @csrf
                @method('DELETE')
                <input name="project_to_delete" type="hidden" value="{{$userProject->id}}">
                <button class="waves-effect waves-light btn red" type="submit"
                    form="deleteProjectForm-{{$userProject->id}}" value="Submit">Delete this project</button>
            </form>
        </div>
    </div>
</div>
@stop

<script>
    document.addEventListener('DOMContentLoaded', function() {
            el =  document.getElementById("projectTabs");
            var instance = M.Tabs.init(el, options = null);

            var elems = document.querySelectorAll('.datepicker');
            options = {
                'format': 'yyyy-mm-dd'
            }
            var instances = M.Datepicker.init(elems, options);

            var elems = document.querySelectorAll('.timepicker');
            options = {
                'twelveHour': false
            }
            var instances = M.Timepicker.init(elems, options);
      });
</script>
