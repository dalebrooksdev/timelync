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
    <div class="flex flex-wrap justify-center">
        @foreach ($userProjects as $project)
        <div class="m-4 md:w-1/2 lg:w-1/3 xl:w-1/4">
        <div class="card ">
            <div class="card-image">
                <img src="https://picsum.photos/200">
                <span class="card-title bg-black">{{ $project->title }}</span>
                <a href="/projects/{{$project->id}}" class="btn-floating halfway-fab waves-effect waves-light red btn-large"><i
                        class="material-icons">remove_red_eye</i></a>
            </div>
            <div class="card-content">
                <p class="pb-4">{{ $project->description }}</p>
                <span class="mb-2"><b>Time spent:</b> 4hrs 2min 20sec</span>
                <br />
                <span class="mb-2"><b>Billable:</b> $1904.43</span>
                <br />
                <div class="mt-4">

                </div>

            </div>
        </div>
    </div>
        @endforeach
    </div>
</div>

@stop