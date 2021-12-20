<!DOCTYPE html>
<html>
<head>
    <title>Kalendarz</title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/pl.js"></script>

    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
    <div class="heading">
        <div class="logo text-center">
            <a href="/">
                <img src="img/logodenti.png" alt="User Icon" />
            </a>
        </div>
        <br />
        <div id="calendar" ></div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        function checkSelectAllow(selectInfo) {
            console.log("selectInfo.end", selectInfo.end)
            const duration = moment.duration(selectInfo.end.diff(selectInfo.start));
            const diffInMinutes = duration.asMinutes();
            console.log("diffInMinutes", diffInMinutes)
            return diffInMinutes <= 60;
        }
        var calendar = $('#calendar').fullCalendar({
            header:{
                left:'prev,next today',
                center:'title',
                right:'agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            locale: 'pl',
            events:'/full-calender',
            selectable:true,
            selectHelper:true,
            minTime:'08:00:00',
            maxTime:'19:00:00',
            contentHeight:'auto',
            eventLimit: true,
            expandRows:true,
            weekends:false,
            selectAllow: checkSelectAllow,
            select:function(start, end, allDay)
            {
                var title = prompt('Wpisz swój email:');
                if(title)
                {
                    var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                    $.ajax({
                        url:"/full-calender/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            type: 'add'
                        },
                        success:function(data)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Wizyta została dodana poprawnie");
                        }
                    })
                }
            },
            editable:true,
            eventResize: function(event, delta)
            {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        id: id,
                        type: 'update'
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Wizyta została zaktualizowana poprawnie.");
                    }
                })
            },
            eventDrop: function(event, delta)
            {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        id: id,
                        type: 'update'
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Wizyta została zaktualizowana poprawnie.");
                    }
                })
            },
            eventClick:function(event)
            {
                if(confirm("Jesteś pewien, że chcesz usunąć tą wizytę?"))
                {
                    var id = event.id;
                    $.ajax({
                        url:"/full-calender/action",
                        type:"POST",
                        data:{
                            id:id,
                            type:"delete"
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Wizyta została usunięta poprawnie.");
                        }
                    })
                }
            }
        });
        // calendar.render();
    });
</script>

</body>
</html>
