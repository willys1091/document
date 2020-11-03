@extends('template')
@section('content')
<div class="content-wrapper">
@include('breadcrumb')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner"><h3>150</h3><p>Open</p></div>
                        <div class="icon"><i class="ion ion-bag"></i></div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner"><h3>53<sup style="font-size: 20px">%</sup></h3><p>Approve</p></div>
                        <div class="icon"><i class="ion ion-stats-bars"></i></div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner"><h3>44</h3><p>Reject</p></div>
                        <div class="icon"><i class="ion ion-person-add"></i></div>
                       {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner"><h3>65</h3><p>Revision</p></div>
                        <div class="icon"><i class="ion ion-pie-graph"></i></div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <section class="col-lg-5 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="ion ion-clipboard mr-1"></i> On Progress List</h3>
                        </div>
                        <div class="card-body">
                            <ul class="todo-list" data-widget="todo-list">
                                <li>
                                    <span class="text">Design a nice theme</span>
                                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="text">Make the theme responsive</span>
                                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o    "></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
                        </div>
                    </div>
                </section> --}}
                {{-- <section class="col-lg-7 connectedSortable">
                    <div class="card ">
                        <div class="card-header border-0">
                            <h3 class="card-title"><i class="far fa-calendar-alt"></i> Calendar</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div id="external-events" style='display:none;'>
                            <div class="external-event bg-success">Lunch</div>
                            <div class="external-event bg-warning">Go home</div>
                            <div class="external-event bg-info">Do homework</div>
                            <div class="external-event bg-primary">Work on UI design</div>
                            <div class="external-event bg-danger">Sleep tight</div>
                            <div class="checkbox">
                              <label for="drop-remove">
                                <input type="checkbox" id="drop-remove">
                                remove after drop
                              </label>
                            </div>
                          </div>
                        <div class="card-body pt-0"><div id="calendar"></div></div>
                    </div>
                </section> --}}
            </div>
        </div>
    </section>
</div>
<script>
    $(function () {
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        var calendar = new Calendar(calendarEl, {
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
            header    : {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
        'themeSystem': 'bootstrap',
        events    : [

        ],
        editable  : false,
        droppable : false,
      });
      calendar.render();
    })
  </script>
@stop
