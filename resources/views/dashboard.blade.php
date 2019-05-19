@extends('layouts.main')

@section('navExtention')
    @parent
    <span class="nav-title ml-4">Dashboard</span>
    <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal">
        <i class="material-icons">add</i>
    </a>
@stop
@section('mainContent')
    @parent

    <div class="row mt-8">
        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image">
                    <img src="https://picsum.photos/200">
                    <span class="card-title">My Freelance Project</span>
                    <a href="{{ url('/project') }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">remove_red_eye</i></a>
                </div>
                <div class="card-content">
                    <p class="pb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem illum vitae in, quo dicta repellendus dolor tempora sequi excepturi aliquid. Tenetur expedita tempora laudantium quasi recusandae nulla saepe at necessitatibus.</p>
                    <span class="mb-2"><b>Time spent:</b> 4hrs 2min 20sec</span>
                    <br/>
                    <span class="mb-2"><b>Billable:</b> $1904.43</span>
                <br/>
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
        </div>
        <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://picsum.photos/200">
                        <span class="card-title">Card Title</span>
                    <a href="{{ url('/project') }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">remove_red_eye</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>
    </div>
@stop
