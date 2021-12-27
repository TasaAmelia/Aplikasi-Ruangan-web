@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">{{ $title }}</a></div>
            <div class="breadcrumb-item">Dashboard</div>
        </div>
      </div>
    </section>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          selectable: true,
          height: 900,
          contentHeight: 600,
          initialView: 'dayGridMonth',
          // dateClick: function(info) {
          //   alert('clicked ' + info.dateStr);
          // },
          select: function(startDate){
            console.log(startDate);
          },
          // start: '', // will normally be on the left. if RTL, will be on the right
          // center: '',
          // end: '' // will normally be on the right. if RTL, will be on the left
          headerToolbar: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title',
            right: 'today prevYear,prev,next,nextYear'
          },
          events: [
            { id: '1', title: 'Event 1', start: '2021-12-18', resourceId: 'a' }
          ]
        });
        calendar.render();
      });
      // $(document).ready(function () {
      //     $.ajaxSetup({
      //       headers:{
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //       }
      //     });
      //     var calendar = $('#calendar').fullcaendar();
      // });

    </script>

    <div id='calendar'></div>

    <style>
      .calendar{
        padding: 5rem 15rem
      }
    </style>

@endsection