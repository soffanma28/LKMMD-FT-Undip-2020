{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Calendar')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/fullcalendar/js/main.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/fullcalendar/daygrid/main.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/fullcalendar/timegrid/main.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/fullcalendar/list/main.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2-materialize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/form-select2.css') }}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-calendar.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- Full Calendar -->
<div id="app-calendar">
  <div class="calendar-filter animated slideInDown slow">
    <div class="card-panel pt-1 pb-1">
      <div class="row">
        <form method="GET" action="{{ route('peserta.calendar') }}">
          @csrf
            <div class="input-field col s12 m6 l4 animated zoomIn slow">
              <select id="delegasi" class="select2 browser-default" name="delegasi">
                    <option value="" selected>Delegasi</option>
                    <option value="HMTL">HMTL</option>
                    <option value="HMTI">HMTI</option>
                    <option value="HMM">HMM</option>
                    <option value="HME">HME</option>
                    <option value="HMTK">HMTK</option>
                    <option value="HIMASPAL">HIMASPAL</option>
                    <option value="HIMASKOM">HIMASKOM</option>
                    <option value="HMTG Magmadipa">HMTG Magmadipa</option>
                    <option value="HM Teknik Geodesi">HM Teknik Geodesi</option>
                    <option value="HMTP">HMTP</option>
                    <option value="HMS">HMS</option>
                    <option value="PSMT">PSMT</option>
                    <option value="Izzati">Izzati</option>
                    <option value="PMK">PMK</option>
                    <option value="PRMK">PRMK</option>
                    <option value="Momentum">Momentum</option>
                    <option value="FST">FST</option>
                    <option value="BEM FT">BEM FT</option>
                    <option value="SM FT">SM FT</option>
                    <option value="NON FT">NON FT</option>
              </select>
            </div>
            <div class="col s12 m6 l3 right">
              <div class="input-field col l10">
                
              </div>
              <div class="input-field col l2 pl-0 animated fadeInRight delay-1s">
                <button type="submit" name="action" class="btn-floating"><i class="material-icons">search</i></button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row animated slideInUp slow">
    <div class="col s12">
      <div class="card mt-0">
        <div class="card-content">
          <h4 class="card-title">
            Peserta's Birthday
          </h4>
          <div id="basic-calendar"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- START Modal Event Description -->
<div id="modalEventView" class="modal border-radius-6">
  <div class="modal-content center">
    <img class="" width="192" height="192" src="{{ asset('images/birthday.png') }}">
    <h3 class="mt-0" id="modalTitle" style="color: #3F51B5;">Happy Birthday</h3>
    <div class="card-content">
      <h5 class="center" id="name" style="color: #3F51B5;"></h5>
      <h5 class="center" id="date" style="color: #3F51B5;"></h5>
    </div>
  </div>
</div>
<!-- END Modal Event Description -->
@endsection

{{--vendor scripts  --}}
@section('vendor-script')
<script src="{{asset('vendors/fullcalendar/lib/moment.min.js')}}"></script>
<script src="{{asset('vendors/fullcalendar/js/main.min.js')}}"></script>
<script src="{{asset('vendors/fullcalendar/daygrid/main.min.js')}}"></script>
<script src="{{asset('vendors/fullcalendar/timegrid/main.min.js')}}"></script>
<script src="{{asset('vendors/fullcalendar/list/main.min.js')}}"></script>
<script src="{{asset('vendors/fullcalendar/interaction/main.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script type="text/javascript">
  var events = [
    @foreach($pesertas as $event)
    {
      'id' : <?php echo $event->id ?>,
      'title' : "{{$event->nama}}'s Birthday",
      'start' : "{{$event->tanggal_lahir}}",
      'name' : "{{$event->nama}}",
      'end' : ""
    },
    @endforeach
  ];
/* Calendar */
/*-------- */

$(document).ready(function () {

  $(".select2").select2({
    /* the following code is used to disable x-scrollbar when click in select input and
    take 100% width in responsive also */
    dropdownAutoWidth: true,
    width: '100%',
  });

  /* initialize the calendar
   -----------------------------------------------------------------*/
  var Calendar = FullCalendar.Calendar;

  //  Basic Calendar Initialize
  var basicCal = document.getElementById('basic-calendar');
  var fcCalendar = new FullCalendar.Calendar(basicCal, {
    header: {
      left: 'prev,next',
      center: 'title',
      right: 'listYear,listMonth'
    },
    views: {
      listMonth: {
        buttonText: 'list month'
      },
      listYear: {
        buttonText: 'list year'
      }
    },
    defaultView: 'listYear',
    defaultDate: '2001-01-01',
    editable: false,
    plugins: ["dayGrid", "interaction", "list"],
    eventLimit: true, // allow "more" link when too many events
    events: events,
    eventClick : function(event) {
      // Modal Value
      var options = { year: 'numeric', month: 'long', day: 'numeric' };
      $('#modalTitle').text(event.title);
      $('#name').text(event.event.extendedProps.name);
      $('#date').text(new Date(event.event.start).toLocaleDateString("en-US", options));
      

      var elem = document.getElementById('modalEventView')
      var instance = M.Modal.init(elem);
      instance.open();
    }
  });
  fcCalendar.render();


})
</script>
@endsection