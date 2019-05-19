@extends('layouts.main')

@section('navExtention')
@parent
<span class="nav-title ml-4">Dashboard</span>
<a href="{{ url('/projects/create') }}" class="btn-floating btn-large halfway-fab waves-effect waves-light teal">
    <i class="material-icons">add</i>
</a>
@stop
@section('mainContent')
@parent
<div class="m-4">
    <h4>Projects</h4>
@foreach ($userProjects as $project)
    <div class="card">
        <div class="card-image">
            <img src="https://picsum.photos/200">
            <span class="card-title">{{ $project->title }}</span>
            <a href="{{ url('/project') }}" class="btn-floating halfway-fab waves-effect waves-light red"><i
                    class="material-icons">remove_red_eye</i></a>
        </div>
        <div class="card-content">
        <p class="pb-4">{{ $project->description }}</p>
            <span class="mb-2"><b>Time spent:</b> 4hrs 2min 20sec</span>
            <br />
            <span class="mb-2"><b>Billable:</b> $1904.43</span>
            <br />
            <div class="mt-4">
                <div class="chip">
                    Personal
                    <i class="close material-icons">close</i>
                </div>
                <div class="chip">
                    Jane Doe
                    <i class="close material-icons">close</i>
                </div>
                <div class="chip">
                    Commerce
                    <i class="close material-icons">close</i>
                </div>
            </div>

        </div>
    </div>
@endforeach
</div>

@stop
