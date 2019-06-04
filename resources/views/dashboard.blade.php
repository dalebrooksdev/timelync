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
<div>
    <h4>Projects</h4>
    <div class="flex justify-stretch">
        @foreach ($userProjects as $project)
        <div class="card m-4 w-full">
            <div class="card-image">
                <img src="https://picsum.photos/200">
                <span class="card-title bg-black">{{ $project->title }}</span>
                <a href="/projects/{{$project->id}}" class="btn-floating halfway-fab waves-effect waves-light red btn-large"><i
                        class="material-icons">remove_red_eye</i></a>
            </div>
            <div class="card-content">
                <p class="pb-4">{{ $project->description }}</p>
                @if ($project->timestamp->first())
                <span class="mb-2"><b>Time spent:</b> {{$project->timestamp->first()->getTotalTimeSpent($project->id)}}</span>
                @else 
                <span class="mb-2"><b>Time spent:</b> Not started</span>
                @endif
                <br />
                @if ($project->timestamp->first())
                <span class="mb-2"><b>Billable:</b> {{$project->timestamp->first()->getTotalCharges($project->id)}}</span>
                @else 
                <span class="mb-2"><b>Billable:</b> $0.00</span>
                @endif
                <br />
                <div class="mt-4">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop