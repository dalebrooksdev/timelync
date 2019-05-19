<style>
  HTML CSS Result EDIT ON .timeline {
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
<span class="nav-title ml-4">Project Title</span>
<ul class="tabs tabs-transparent" id="projectTabs">
  <li class="tab active"><a href="#timeTracker">Time Tracker</a></li>
  <li class="tab disabled"><a href="#timeTracker2">Invoice</a></li>
  <li class="tab disabled"><a href="#timeTracker2">Settings</a></li>

</ul>

@stop
@section('mainContent')
@parent

<div id="timeTracker" class="col s12">

  <div class="row p-4">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Start a new task</span>
          <div class="row mb-0">
            <div class="input-field col s12">
              <input id="taskDescription" type="text" class="validate">
              <label class="active" for="taskDescription">What are you working on?</label>
            </div>
          </div>
        </div>
        <div class="card-action">
          <a class="btn-floating btn-large waves-effect waves-light light-blue darken-1"><i
              class="large material-icons">play_arrow</i></a>
        </div>
      </div>
    </div>

    <div class="col s12 m6">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Enter manual task</span>
          <div class="row mb-0">
            <div class="input-field col s12">
              <input type="text" class="datepicker" id="taskDate">
              <label class="active" for="taskDate">Date of task</label>
            </div>
            <div class="input-field col s6">
              <input type="text" class="datepicker" id="taskTimeStart">
              <label class="active" for="taskTimeStart">Start time</label>
            </div>
            <div class="input-field col s6">
              <input type="text" class="datepicker" id="taskTimeEnd">
              <label class="active" for="taskTimeEnd">End time</label>
            </div>
          </div>
        </div>
        <div class="card-action">
          <a class="btn-floating btn-flat btn-large waves-effect waves-light light-blue darken-1"><i
              class="large material-icons">add</i></a>
        </div>
      </div>

    </div>

    <div class="col s12">
      <h3 class="center-align">Timeline</h3>
      <div class="container">
        <div class="timeline">
          <div class="timeline-event">
            <div class="card timeline-content">
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Tile<i
                    class="material-icons right">more_vert</i></span>
                <p>Content <a href="#">This is a link</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i
                    class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
            <div class="timeline-badge blue white-text"><i class="material-icons">language</i></div>
          </div>
          <div class="timeline-event">
            <div class="card timeline-content">
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Tile<i
                    class="material-icons right">more_vert</i></span>
                <p>Content <a href="#">This is a link</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i
                    class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
            <div class="timeline-badge red white-text"><i class="material-icons">work</i></div>
          </div>
          <div class="timeline-event">
            <div class="card timeline-content">
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Tile<i
                    class="material-icons right">more_vert</i></span>
                <p>Content <a href="#">This is a link</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i
                    class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
              </div>
            </div>
            <div class="timeline-badge green white-text"><i class="material-icons">person</i></div>
          </div>
        </div>
      </div>
    </div>

  </div>

  @stop

  <script>
    document.addEventListener('DOMContentLoaded', function() {
            el =  document.getElementById("projectTabs");
            var instance = M.Tabs.init(el, options = null);

            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, options = null);
      });
  </script>
