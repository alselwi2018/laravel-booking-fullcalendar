<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hiring') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://unpkg.com/@popperjs/core@2"></script>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
       
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="/">Home</a>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
$(document).ready(function(){
    var url = "{{ url('/')}}";
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'month,basicWeek,basicDay,today',
            center: 'title',
            right: 'prev,next'
        },
        fixedWeekCount: false,
          editable: true,
          events: url + "/",
          displayEventTime: true,
          editable: true,
          color: 'yellow',    // an option!
          textColor: 'black',
          eventRender: function (event, element, view) {
            if(event.userIcon){          
                        element.find(".fc-title").append(" <i class='glyphicon glyphicon-user'></i>");
                    }
          },
          selectable: true,
          selectHelper: true,
          select: function (start, end, allDay,driver_id,vehicle_id) {
              var title = prompt('Enter Booking Title:');
              var driver = prompt('Enter Driver ID');
              var vehicle = prompt('Enter Vehicle ID');
              var vehicle_type = prompt('Car or Bus');
              if (title) {
                  var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                  var end = $.fullCalendar.formatDate(end, "Y-MM-DD"); 
                  $.ajax({
                      url: url + "/main/store",
                      data: 'title=' + title + '&start=' + start + '&end=' + end + '&driver_id=' + driver + '&vehicle_id=' +vehicle+'&vehicle= '+vehicle_type,  
                      method: 'POST',  
                      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                      responseType: 'json',
                      success: function (data) {
                          displayMessage("Added Successfully");
                      }
                  });
                  calendar.fullCalendar('renderEvent',
                          {
                              title: title,  
                              start: start,
                              end: end,
                          },
                  true
                          );
              }
              calendar.fullCalendar('unselect');
          }
    });
});
function displayMessage(message) {

$(".response").html(" "+message+" ");

setInterval(function() { $(".success").fadeOut(); }, 1000);

}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script type="text/javascript">
    $('.datepicker').datepicker({
        format: "yyyy-m-d",
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('.datepicker').datepicker("setDate", new Date());
</script>
</html>
