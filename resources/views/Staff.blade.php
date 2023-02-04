@extends('layouts.main')

@section('content')

    <main>
        <div class="BarberPage col-md-10 mx-auto">
            <div class="mainRow row">
                <div class="barberLeftPage col-md-8">
                    <div class="BarberImgDiv">
                        @if($barber->photo != '')
                            <img class="BarberImg" src="../../storage/{{$barber->photo}}" alt="">
                        @else
                            <img class="BarberImg" src="img/barberdefault.jpg">
                        @endif
                    </div>

                    <!-- Main content -->
                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="GeoArtText">აირჩიეთ მომსახურება შემდეგ ვიზიტის დრო</h4>
                            </div>
                            <div class="card-body">
                                <!-- the events -->
                                <div class="abilities col-md-12">
                                    <table class="">
                                        <tr>
                                            <th></th>
                                            <th>მომსახურება</th>
                                            <th>
                                                <label class="" style="width: 70px;">ფასი.</label>
                                                <label class="">₾</label></th>
                                            <th>
                                                <label class="" style="width: 140px;">ხანგრძლივობა. საათი:წუთი</label>
                                            </th>
                                        </tr>
                                        @foreach($abilities as $ability)
                                            <tr>
                                                <td class="check">
                                                    <input class="custom-control-input"
                                                           type="checkbox"
                                                           id="customCheckbox{{$N}}" name="{{$N}}"
                                                           value="{{ $ability->service }}"
                                                           onclick="isChecked()">
                                                </td>
                                                <td class="service">
                                                    <input class="form-control"
                                                           for="customCheckbox{{$N}}"
                                                           id="chck{{$N}}" name="chck{{$N}}"
                                                           value="{{ $ability->service }}" disabled>
                                                </td>
                                                <td class="price">
                                                    <div class="btn-group">
                                                        <input class="" id="price{{$N}}"
                                                               name="price{{$N}}"
                                                               value="{{ $ability->price }}"
                                                               disabled>
                                                    </div>
                                                </td>
                                                <td class="time">
                                                    <input class="" id="procH{{$N}}"
                                                           name="procH{{$N}}"
                                                           value="{{ $ability->hour }}"
                                                           style="text-align: center"
                                                           disabled>
                                                    <label class="">:</label>
                                                    <input class="" id="procM{{$N}}"
                                                           name="procM{{$N}}"
                                                           value="{{ $ability->minute }}"
                                                           disabled>
                                                </td>
                                            </tr>
                                            <script>
                                                var servTh{{$N}} = '{{ $ability->hour }}';
                                                var servTm{{$N}} = '{{ $ability->minute }}';
                                            </script>
                                            <label class="" hidden>{{ $N++ }}</label>

                                        @endforeach
                                    </table>
                                </div>


                                        <!-- THE CALENDAR -->
                                        <div id="calendar"></div>



                            <form action="{{ route('Booksy.Create', $barber->id) }}"
                                  method="post">
                                @csrf
                                <div class="booksyForm">
                                    <div class="col-md-4 barbLeftImgDiv">
                                        <img class="w-100" src="../img/hsnpm.jpg">
                                    </div>

                                    <div class=" book col-md-4">
                                        <h4 class="text-center">თქვენი ჯავშანი</h4>
                                        <div class="form-group">
                                            <input class="" id="start" name="start" value=""
                                                   hidden>
                                            <input class="" id="end" name="end" value="" hidden>
                                            <input class="" id="start_ms" name="start_ms"
                                                   value="" hidden>
                                            <input class="" id="dur_ms" name="dur_ms" value=""
                                                   hidden>
                                            <input class="" id="end_ms" name="end_ms" value=""
                                                   hidden>
                                            <label class="">თარიღი:</label>
                                            <input class="form-control" id="startdate"
                                                   name="startdate" value="" hidden>
                                            <input class="form-control" id="startdatee"
                                                   name="startdatee" value="" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label class="">საათი:</label>
                                            <input class="form-control" id="starthour"
                                                   name="starthour" value="" hidden>
                                            <input class="form-control" id="starthourr"
                                                   name="starthourr" value="" disabled>
                                        </div>

                                        <div class="form-group">
                                            {{--                                                                        <label class="">მომსახურება:</label>--}}
                                            <textarea class="form-control" id="service"
                                                      name="service" hidden></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="">ხანგრძლივობა:</label>
                                            <input class="form-control" id="allProcT"
                                                   name="allProcT" value="" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label class="">სულ ფასი:</label>
                                            <input class="form-control" id="allprice"
                                                   name="allprice" value="" disabled>
                                        </div>

                                        <div
                                            class="form-check mt-3 d-flex justify-content-center">
                                            <div class="">
                                                <input type="checkbox" class="form-check-input"
                                                       name="RoleConcent"
                                                       id="RoleConsent"
                                                       required>
                                                <label class="form-check-label ml-3"
                                                       for="exampleCheck1">ვეთანხმები</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mx-auto text-center mt-3">
                                            @if(Auth::user())

                                                <button class="btn btn-primary mb-5" type="submit"
                                                        id="booksyBtn" disabled>დაჯავშნე
                                                </button>
                                            @else
                                                <label class="authRequest">დაჯავშნისთვის გაიარეთ
                                                    ავტორიზაცია.</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="w-100" src="../img/hsnpg.jpg">

                                    </div>
                                </div>
                            </form>

                            <div id="external-events">
                            </div>

                        </div>
                        <!-- /.card-body -->
                        </div><!-- /.card -->
                    </section>
                    <!-- /.content -->

                    <script>var eventz = [];</script>
                    @foreach($events as $event)
                        <script>
                            eventz.push({
                                title: '{{$event->title}}',
                                start: '{{$event->start}}',
                                end: '{{$event->end}}',
                                allDay: false
                            });
                        </script>
                    @endforeach

                    <script>
                        var checkbox1 = document.getElementById('customCheckbox1');
                        var checkbox2 = document.getElementById('customCheckbox2');
                        var checkbox3 = document.getElementById('customCheckbox3');
                        var checkbox4 = document.getElementById('customCheckbox4');
                        var checkbox5 = document.getElementById('customCheckbox5');
                        var checkbox6 = document.getElementById('customCheckbox6');
                        var checkbox7 = document.getElementById('customCheckbox7');
                        var checkbox8 = document.getElementById('customCheckbox8');
                        var checkbox9 = document.getElementById('customCheckbox9');
                        var checkbox10 = document.getElementById('customCheckbox10');
                        var checkbox11 = document.getElementById('customCheckbox11');
                        var checkbox12 = document.getElementById('customCheckbox12');
                        var checkbox13 = document.getElementById('customCheckbox13');
                        var checkbox14 = document.getElementById('customCheckbox14');
                        var checkbox15 = document.getElementById('customCheckbox15');

                        var chck1 = document.getElementById('chck1');
                        var chck2 = document.getElementById('chck2');
                        var chck3 = document.getElementById('chck3');
                        var chck4 = document.getElementById('chck4');
                        var chck5 = document.getElementById('chck5');
                        var chck6 = document.getElementById('chck6');
                        var chck7 = document.getElementById('chck7');
                        var chck8 = document.getElementById('chck8');
                        var chck9 = document.getElementById('chck9');
                        var chck10 = document.getElementById('chck10');
                        var chck11 = document.getElementById('chck11');
                        var chck12 = document.getElementById('chck12');
                        var chck13 = document.getElementById('chck13');
                        var chck14 = document.getElementById('chck14');
                        var chck15 = document.getElementById('chck15');

                        var price1 = document.getElementById('price1');
                        var price2 = document.getElementById('price2');
                        var price3 = document.getElementById('price3');
                        var price4 = document.getElementById('price4');
                        var price5 = document.getElementById('price5');
                        var price6 = document.getElementById('price6');
                        var price7 = document.getElementById('price7');
                        var price8 = document.getElementById('price8');
                        var price9 = document.getElementById('price9');
                        var price10 = document.getElementById('price10');
                        var price11 = document.getElementById('price11');
                        var price12 = document.getElementById('price12');
                        var price13 = document.getElementById('price13');
                        var price14 = document.getElementById('price14');
                        var price15 = document.getElementById('price15');

                        var procH1 = document.getElementById('procH1');
                        var procH2 = document.getElementById('procH2');
                        var procH3 = document.getElementById('procH3');
                        var procH4 = document.getElementById('procH4');
                        var procH5 = document.getElementById('procH5');
                        var procH6 = document.getElementById('procH6');
                        var procH7 = document.getElementById('procH7');
                        var procH8 = document.getElementById('procH8');
                        var procH9 = document.getElementById('procH9');
                        var procH10 = document.getElementById('procH10');
                        var procH11 = document.getElementById('procH11');
                        var procH12 = document.getElementById('procH12');
                        var procH13 = document.getElementById('procH13');
                        var procH14 = document.getElementById('procH14');
                        var procH15 = document.getElementById('procH15');

                        var procM1 = document.getElementById('procM1');
                        var procM2 = document.getElementById('procM2');
                        var procM3 = document.getElementById('procM3');
                        var procM4 = document.getElementById('procM4');
                        var procM5 = document.getElementById('procM5');
                        var procM6 = document.getElementById('procM6');
                        var procM7 = document.getElementById('procM7');
                        var procM8 = document.getElementById('procM8');
                        var procM9 = document.getElementById('procM9');
                        var procM10 = document.getElementById('procM10');
                        var procM11 = document.getElementById('procM11');
                        var procM12 = document.getElementById('procM12');
                        var procM13 = document.getElementById('procM13');
                        var procM14 = document.getElementById('procM14');
                        var procM15 = document.getElementById('procM15');

                        var allProcT = document.getElementById('allProcT');
                        var service = document.getElementById('service');
                        var allPrice = document.getElementById('allprice');
                        var dur_ms = document.getElementById('dur_ms');

                        function isChecked() {

                            var C1 = '';
                            var C2 = '';
                            var C3 = '';
                            var C4 = '';
                            var C5 = '';
                            var C6 = '';
                            var C7 = '';
                            var C8 = '';
                            var C9 = '';
                            var C10 = '';
                            var C11 = '';
                            var C12 = '';
                            var C13 = '';
                            var C14 = '';
                            var C15 = '';

                            var P1 = 0;
                            var P2 = 0;
                            var P3 = 0;
                            var P4 = 0;
                            var P5 = 0;
                            var P6 = 0;
                            var P7 = 0;
                            var P8 = 0;
                            var P9 = 0;
                            var P10 = 0;
                            var P11 = 0;
                            var P12 = 0;
                            var P13 = 0;
                            var P14 = 0;
                            var P15 = 0;

                            var T1 = 0;
                            var T2 = 0;
                            var T3 = 0;
                            var T4 = 0;
                            var T5 = 0;
                            var T6 = 0;
                            var T7 = 0;
                            var T8 = 0;
                            var T9 = 0;
                            var T10 = 0;
                            var T11 = 0;
                            var T12 = 0;
                            var T13 = 0;
                            var T14 = 0;
                            var T15 = 0;


                            if (checkbox1 && checkbox1.checked) {
                                C1 = chck1.value + '.\r';
                                P1 = Number(price1.value);
                                T1 = (procH1.value * 60 * 60 * 1000) + (procM1.value * 60 * 1000);
                            } else {
                                C1 = '';
                                P1 = 0;
                                T1 = 0;
                            }
                            if (checkbox2 && checkbox2.checked) {
                                C2 = chck2.value + '.\r';
                                P2 = Number(price2.value);
                                T2 = (procH2.value * 60 * 60 * 1000) + (procM2.value * 60 * 1000);
                            } else {
                                C2 = '';
                                P2 = 0;
                                T2 = 0;
                            }
                            if (checkbox3 && checkbox3.checked) {
                                C3 = chck3.value + '.\r';
                                P3 = Number(price3.value);
                                T3 = (procH3.value * 60 * 60 * 1000) + (procM3.value * 60 * 1000);
                            } else {
                                C3 = '';
                                P3 = 0;
                                T3 = 0;
                            }
                            if (checkbox4 && checkbox4.checked) {
                                C4 = chck4.value + '.\r';
                                P4 = Number(price4.value);
                                T4 = (procH4.value * 60 * 60 * 1000) + (procM4.value * 60 * 1000);
                            } else {
                                C4 = '';
                                P4 = 0;
                                T4 = 0;
                            }
                            if (checkbox5 && checkbox5.checked) {
                                C5 = chck5.value + '.\r';
                                P5 = Number(price5.value);
                                T5 = (procH5.value * 60 * 60 * 1000) + (procM5.value * 60 * 1000);
                            } else {
                                C5 = '';
                                P5 = 0;
                                T5 = 0;
                            }
                            if (checkbox6 && checkbox6.checked) {
                                C6 = chck6.value + '.\r';
                                P6 = Number(price6.value);
                                T6 = (procH6.value * 60 * 60 * 1000) + (procM6.value * 60 * 1000);
                            } else {
                                C6 = '';
                                P6 = 0;
                                T6 = 0;
                            }
                            if (checkbox7 && checkbox7.checked) {
                                C7 = chck7.value + '.\r';
                                P7 = Number(price7.value);
                                T7 = (procH7.value * 60 * 60 * 1000) + (procM7.value * 60 * 1000);
                            } else {
                                C7 = '';
                                P7 = 0;
                                T7 = 0;
                            }
                            if (checkbox8 && checkbox8.checked) {
                                C8 = chck8.value + '.\r';
                                P8 = Number(price8.value);
                                T8 = (procH8.value * 60 * 60 * 1000) + (procM8.value * 60 * 1000);
                            } else {
                                C8 = '';
                                P8 = 0;
                                T8 = 0;
                            }
                            if (checkbox9 && checkbox9.checked) {
                                C9 = chck9.value + '.\r';
                                P9 = Number(price9.value);
                                T9 = (procH9.value * 60 * 60 * 1000) + (procM9.value * 60 * 1000);
                            } else {
                                C9 = '';
                                P9 = 0;
                                T9 = 0;
                            }
                            if (checkbox10 && checkbox10.checked) {
                                C10 = chck10.value + '.\r';
                                P10 = Number(price10.value);
                                T10 = (procH10.value * 60 * 60 * 1000) + (procM10.value * 60 * 1000);
                            } else {
                                C10 = '';
                                P10 = 0;
                                T10 = 0;
                            }
                            if (checkbox11 && checkbox11.checked) {
                                C11 = chck11.value + '.\r';
                                P11 = Number(price11.value);
                                T11 = (procH11.value * 60 * 60 * 1000) + (procM11.value * 60 * 1000);
                            } else {
                                C11 = '';
                                P11 = 0;
                                T11 = 0;
                            }
                            if (checkbox12 && checkbox12.checked) {
                                C12 = chck12.value + '.\r';
                                P12 = Number(price12.value);
                                T12 = (procH12.value * 60 * 60 * 1000) + (procM12.value * 60 * 1000);
                            } else {
                                C12 = '';
                                P12 = 0;
                                T12 = 0;
                            }
                            if (checkbox13 && checkbox13.checked) {
                                C13 = chck13.value + '.\r';
                                P13 = Number(price13.value);
                                T13 = (procH13.value * 60 * 60 * 1000) + (procM13.value * 60 * 1000);
                            } else {
                                C13 = '';
                                P13 = 0;
                                T13 = 0;
                            }
                            if (checkbox14 && checkbox14.checked) {
                                C14 = chck14.value + '.\r';
                                P14 = Number(price14.value);
                                T14 = (procH14.value * 60 * 60 * 1000) + (procM14.value * 60 * 1000);
                            } else {
                                C14 = '';
                                P14 = 0;
                                T14 = 0;
                            }
                            if (checkbox15 && checkbox15.checked) {
                                C15 = chck15.value + '.\r';
                                P15 = Number(price15.value);
                                T15 = (procH15.value * 60 * 60 * 1000) + (procM15.value * 60 * 1000);
                            } else {
                                C15 = '';
                                P15 = 0;
                                T15 = 0;
                            }

                            service.innerHTML = C1 + C2 + C3 + C4 + C5 + C6 + C7 + C8 + C9 + C10 + C11 + C12 + C13 + C14 + C15;
                            allPriceValue = P1 + P2 + P3 + P4 + P5 + P6 + P7 + P8 + P9 + P10 + P11 + P12 + P13 + P14 + P15;
                            allProcTime = T1 + T2 + T3 + T4 + T5 + T6 + T7 + T8 + T9 + T10 + T11 + T12 + T13 + T14 + T15;
                            procHour = Math.floor((allProcTime / (1000 * 60)) / 60);
                            procMinute = (allProcTime / (1000 * 60)) % 60;
                            allPrice.setAttribute('value', allPriceValue + ' ლარი');
                            allProcT.setAttribute('value', procHour + ' საათი : ' + procMinute + ' წუთი');
                            dur_ms.setAttribute('value', allProcTime);
                        }


                        $(function () {

                            /* initialize the external events
                             -----------------------------------------------------------------*/
                            function ini_events(ele) {
                                ele.each(function () {

                                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                                    // it doesn't need to have a start or end
                                    var eventObject = {
                                        title: $.trim($(this).text()) // use the element's text as the event title
                                    }

                                    // store the Event Object in the DOM element so we can get to it later
                                    $(this).data('eventObject', eventObject)

                                    // make the event draggable using jQuery UI
                                    $(this).draggable({
                                        zIndex: 1070,
                                        revert: true, // will cause the event to go back to its
                                        revertDuration: 0  //  original position after the drag
                                    })
                                })
                            }

                            ini_events($('#external-events div.external-event'))

                            /* initialize the calendar
                             -----------------------------------------------------------------*/
                            //Date for the calendar events (dummy data)
                            var date = new Date()
                            var d = date.getDate(),
                                m = date.getMonth(),
                                y = date.getFullYear()

                            var Calendar = FullCalendar.Calendar;
                            var Draggable = FullCalendar.Draggable;

                            var containerEl = document.getElementById('external-events');
                            var checkbox = document.getElementById('drop-remove');
                            var calendarEl = document.getElementById('calendar');

                            var startdate = document.getElementById('startdate');
                            var starthour = document.getElementById('starthour');
                            var startdatee = document.getElementById('startdatee');
                            var starthourr = document.getElementById('starthourr');
                            var start = document.getElementById('start');
                            var end = document.getElementById('end');
                            var start_ms = document.getElementById('start_ms');
                            var dges = new Date().toLocaleDateString('ru-Ru');

                            // initialize the external events
                            // -----------------------------------------------------------------

                            new Draggable(containerEl, {
                                itemSelector: '.external-event',
                                eventData: function (eventEl) {
                                    return {
                                        title: eventEl.innerText,
                                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                                    };
                                }
                            });

                            var calendar = new Calendar(calendarEl, {
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                                },
                                themeSystem: 'bootstrap',
                                //Random default events

                                dateClick: function (info) {
                                    // თუ წარსულს ირჩევს.
                                    if (info.date.toLocaleDateString('ru-Ru') < dges) {
                                        startdate.setAttribute('value', 'წარსული ???');
                                    } else {
                                        startdate.setAttribute('value', info.date.toLocaleDateString('ru-Ru'));
                                        starthour.setAttribute('value', info.date.toLocaleTimeString('ru-Ru'));
                                        startdatee.setAttribute('value', info.date.toLocaleDateString('ru-Ru'));
                                        starthourr.setAttribute('value', info.date.toLocaleTimeString('ru-Ru'));

                                        start.setAttribute('value', info.dateStr);
                                        var tst = new Date(info.dateStr);
                                        tst.setSeconds(tst.getSeconds() + (allProcTime / 1000));
                                        end.setAttribute('value', tst.toISOString());
                                        start_ms.setAttribute('value', info.date.getTime());

                                        if (start.value !== '') {
                                            document.getElementById("booksyBtn").disabled = false;
                                        }
                                    }
                                },

                                events: eventz,
                                // events: [
                                //     {
                                //         title          : 'Lunch',
                                //         start          : new Date(y, m, d, 12, 0),
                                //         end            : new Date(y, m, d, 14, 0),
                                //         allDay         : false,
                                //         backgroundColor: '#00c0ef', //Info (aqua)
                                //         borderColor    : '#00c0ef' //Info (aqua)
                                //     },
                                // ],
                                editable: false,
                                droppable: false, // this allows things to be dropped onto the calendar !!!
                                drop: function (info) {
                                    // is the "remove after drop" checkbox checked?
                                    if (checkbox.checked) {
                                        // if so, remove the element from the "Draggable Events" list
                                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                                    }
                                }
                            });

                            calendar.render();
                            // $('#calendar').fullCalendar()

                            /* ADDING EVENTS */
                            var currColor = '#3c8dbc' //Red by default
                            // Color chooser button
                            $('#color-chooser > li > a').click(function (e) {
                                e.preventDefault()
                                // Save color
                                currColor = $(this).css('color')
                                // Add color effect to button
                                $('#add-new-event').css({
                                    'background-color': currColor,
                                    'border-color': currColor
                                })
                            })
                            $('#add-new-event').click(function (e) {
                                e.preventDefault()
                                // Get value and make sure it is not null
                                var val = $('#new-event').val()
                                if (val.length == 0) {
                                    return
                                }

                                // Create events
                                var event = $('<div />')
                                event.css({
                                    'background-color': currColor,
                                    'border-color': currColor,
                                    'color': '#fff'
                                }).addClass('external-event')
                                event.text(val)
                                $('#external-events').prepend(event)

                                // Add draggable funtionality
                                ini_events(event)

                                // Remove event from text input
                                $('#new-event').val('')
                            })
                        })
                    </script>


                </div><!-- /.col-md-9 -->


                {{-- ========== მარჯვენა სვეტი ========== --}}
                <div class="BarberRightColumn col-md-4">
                    <div class="WorkDays">
                        <label class="headertext">{{$barber->firstname}} {{$barber->lastname}}</label>
                        <div class="BFio">
                            <label class="">სპეციალობა: {{ $barber->role }}</label>
                            <div class="btn-group">
                                <form method="get" action="{{route('Salon', $salon['id'])}}" class="d-flex"
                                      role="search"
                                      style="margin-right: 3em;">
                                    <input class="form-control me-2" id="Search" name="Search" type="search"
                                           placeholder="ძებნა" aria-label="Search" value="{{$salon['name']}}"
                                           hidden>
                                    <label class="" style="margin-top: 0.2em">სალონი: </label>
                                    <button class="btn btn-outline-warning"
                                            style="height: auto; color: #0a0e14; padding: 2px 6px 2px 6px; border-radius: 6px; margin-left: 10px"
                                            type="submit">{{$salon['name']}}</button>
                                </form>

                            </div>
                        </div>
                        <div class="GoldenFrames">
                            <div class="salonGstar">
                                <img src="img/goldenstar.png" alt="" class="Gstar">
                                <label class="Salonrating">{{$Stats['Rating']}}</label>
                            </div>
                            <div class="salonGstar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"
                                     fill="gold" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    <path
                                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                                </svg>
                                <br>
                                <label class="Salonrating">{{$Stats['Sul']}}</label>
                            </div>
                        </div>

                            <div class="skills">
                                @for($i=1; $i<=5; $i++ )
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                <div class="progress-bar">
                                    <div class="five" style="width: {{$Stats['PercentFive']}}%"><span>{{$Stats['PercentFive']}}%</span>
                                    </div>
                                </div>
                                @for($i=1; $i<=4; $i++ )
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                <div class="progress-bar">
                                    <div class="four" style="width: {{$Stats['PercentFour']}}%"><span>{{$Stats['PercentFour']}}%</span>
                                    </div>
                                </div>
                                @for($i=1; $i<=3; $i++ )
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                <div class="progress-bar">
                                    <div class="three" style="width: {{$Stats['PercentThree']}}%"><span>{{$Stats['PercentThree']}}%</span>
                                    </div>
                                </div>
                                @for($i=1; $i<=2; $i++ )
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                <div class="progress-bar">
                                    <div class="two" style="width: {{$Stats['PercentTwo']}}%"><span>{{$Stats['PercentTwo']}}%</span>
                                    </div>
                                </div>
                                <i class="fa-solid fa-star"></i>
                                <div class="progress-bar">
                                    <div class="one" style="width: {{$Stats['PercentOne']}}%"><span>{{$Stats['PercentOne']}}%</span>
                                    </div>
                                </div>
                            </div>
                    </div>

                    @if(Auth::user())

                        @if(isset($check['0']))
                            @foreach($check as $checks)
                                <label class="headertext">ჩემი შეფასება</label>
                                <div class="Feedbacks">
                                    <div class="row">
                                        <div class="FI col-md-6">
                                            <label class="">{{$checks->created_at}}</label>
                                            <br>
                                            <label class="">{{$checks->username}}</label>
                                            <form method="post"
                                                  action="{{route('BarberFeedback.delete', $checks->id)}}">
                                                @csrf
                                                <button id="myBtn" class="btn btn-default" title="წაშლა">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         fill="red"
                                                         class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="FR col-md-6">
                                            @for($i=1; $i<=$checks->star; $i++ )
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <textarea class="FeedbackTextarea form-control"
                                              rows="3">{{$checks->feedback}}</textarea>
                                </div>
                            @endforeach
                        @else

                            @if(Auth::user()->id == $barber->id)

                            @else
                                @if(Auth::user()->sal_id != $barber->sal_id)

                                    <form action="{{route('Feedbackadd', $barber->id)}}" method="post">
                                        @csrf
                                        <div class="rating mt-2">
                                            <input type="radio" name="star" id="star1" value="5"><label
                                                for="star1"></label>
                                            <input type="radio" name="star" id="star2" value="4"><label
                                                for="star2"></label>
                                            <input type="radio" name="star" id="star3" value="3"><label
                                                for="star3"></label>
                                            <input type="radio" name="star" id="star4" value="2"><label
                                                for="star4"></label>
                                            <input type="radio" name="star" id="star5" value="1"><label
                                                for="star5"></label>
                                        </div>
                                        <div class="FeedbackCreate">
                                            <div class="FeedbackText">
                                            <textarea class="form-control mb-1" name="feedback" id="feedback" cols=""
                                                      rows="3"
                                                      placeholder="შეაფასე სტილისტი და დატოვე კომენტარი.">{{ old('feedback') }}</textarea>
                                                <input value="{{Auth::user()->id}}" name="user_id" id="user_id"
                                                       hidden>
                                            </div>
                                            <button class="btn btn-success" type="submit">გაგზავნა</button>
                                            @if($errors->any())
                                                <div class="alert alert-danger" style="font-size: 80%">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{$error}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                @endif

                            @endif
                        @endif
                    @else
                        <div class="Feedbacks">
                            <label class="ifo">შეფასების და კომენტარის დასატოვებლად გაიარეთ ავტორიზაცია.</label>
                        </div>
                    @endif

                    <label class="headertext">კომენტარები</label>
                    @foreach($feedbacks as $feedback)
                        <div class="Feedbacks">
                            <div class="row">
                                <div class="FI col-md-6">
                                    <label class="">{{$feedback->created_at}}</label>
                                    <br>
                                    <label class="">{{$feedback->username}}</label>
                                </div>
                                <div class="FR col-md-6">
                                    @for($i=1; $i<=$feedback->star; $i++ )
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <textarea class="FeedbackTextarea form-control"
                                      rows="3">{{$feedback->feedback}}</textarea>
                        </div>
                    @endforeach
                    <div class="PaginBtn mt-3 d-flex justify-content-center">
                        <label
                            class="">{{ $feedbacks->appends([])->links() }}</label>
                    </div>
                </div><!-- /.მარჯვენა სვეტი -->

            </div><!-- /.row -->



            <h3 class="GeoArtText mt-5">ჩემი ნამუშევრები</h3>
            <br>
            <div class="BarberFlipster">
                <div class="carousel">
                    <ul>
                        <li>
                            @if($barber->flipphoto1 != '')
                                <img class="barberworksimg" alt="ფოტო №1"
                                     src="../../storage/{{$barber->flipphoto1}}">
                            @else
                                <img class="barberworksimg" alt="ფოტო №1" src="{{asset('img/hsnp.jpg')}}">
                            @endif
                        </li>
                        <li>
                            @if($barber->flipphoto2 != '')
                                <img class="barberworksimg" alt="ფოტო №2"
                                     src="../../storage/{{$barber->flipphoto2}}">
                            @else
                                <img class="barberworksimg" alt="ფოტო №2" src="{{asset('img/hsnp.jpg')}}">
                            @endif
                        </li>
                        <li>
                            @if($barber->flipphoto3 != '')
                                <img class="barberworksimg" alt="ფოტო №3"
                                     src="../../storage/{{$barber->flipphoto3}}">
                            @else
                                <img class="barberworksimg" alt="ფოტო №3" src="{{asset('img/hsnp.jpg')}}">
                            @endif
                        </li>
                        <li>
                            @if($barber->flipphoto4 != '')
                                <img class="barberworksimg" alt="ფოტო №4"
                                     src="../../storage/{{$barber->flipphoto4}}">
                            @else
                                <img class="barberworksimg" alt="ფოტო №4" src="{{asset('img/hsnp.jpg')}}">
                            @endif
                        </li>
                        <li>
                            @if($barber->flipphoto5 != '')
                                <img class="barberworksimg" alt="ფოტო №5"
                                     src="../../storage/{{$barber->flipphoto5}}">
                            @else
                                <img class="barberworksimg" alt="ფოტო №5" src="{{asset('img/hsnp.jpg')}}">
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <script>
                $('.carousel').flipster({
                    style: 'carousel',
                    spacing: -0.3,
                });
            </script>
        </div><!-- /.container -->
    </main>

    <!-- AdminLTE for demo purposes -->
@endsection
