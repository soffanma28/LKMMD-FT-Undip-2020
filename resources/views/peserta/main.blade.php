{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2-materialize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/form-select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/shepherd-js/shepherd-theme-default.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/extra-components-tour.css')}}">
<style type="text/css">
	.pesertas .card {
		height: 350px;
		
	}
	.pesertas .card .card-content {
		padding-left: 2%;
		padding-right: 2%;
	}
</style>
@endsection

{{-- page content --}}
@section('content')
<div class="section">
	<div class="peserta-filter animated fadeInDown slow">
	    <div class="card-panel pt-1 pb-1">
	      <div class="row">
	        <form method="POST" action="{{ route('peserta.main') }}" autocomplete="off">
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
	          	<div class="col s12 m6 l3 right animated zoomIn slow">
	          		<div class="input-field col l10">
	          			<input class="autocomplete" type="text" value="{{$search}}" name="search">
	          			<label for="search">Search</label>
	          		</div>
			        <div class="input-field col l2 pl-0">
			        	<button type="submit" name="action" class="btn-floating animated zoomIn slower"><i class="material-icons">search</i></button>
			        </div>
	          	</div>
	        </form>
	      </div>
	    </div>
	</div>
    <div class="card animated fadeInUp slow">
        <div class="card-content">
            <div id="card-panel-type1" class="section pesertas pt-0">
			    <div class="row">
			    	@forelse($pesertas as $key => $peserta)
			    	<!-- ODD  -->
			    	@if($loop->odd)
					<div class="col s12 m6 l3 avatars{{$key}} card-width animated slideInUp delay-1s">
				        <div class="card card-border center-align gradient-45deg-indigo-purple">
				          	<div class="card-content white-text">
				          		<a href="{{ route('peserta.view', $peserta->id) }}">
					            	<img class="responsive-img avatar{{$key}} circle z-depth-4 hoverable" width="100" src="{{asset('images/peserta/'.$peserta->imageurl)}}" alt="avatar" />
					            </a>
					            <h5 class="white-text mb-1">{{$peserta->nama}}</h5>
					            <h6 class="white-text"><b>{{$peserta->delegasi}}</b></h6>
					            <div class="row mt-1">
					              <a target="_blank" href="https://www.instagram.com/{{$peserta->instagram}}" class="col s6">
					                <h5 style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);" class="icon-background circle white-text z-depth-2 mx-auto hoverable">
					                  <i class="fab fa-instagram"></i>
					                </h5>
					                <p class="white-text"><b>{{$peserta->instagram}}</b></p>
					              </a>
					              <a target="_blank" href="http://www.line.me/ti/p/~{{$peserta->line}}" class="col s6">
					                <h5 class="icon-background circle gradient-45deg-green-teal white-text z-depth-2 mx-auto hoverable">
					                  <i class="fab fa-line"></i>
					                </h5>
					                <p class="white-text"><b>{{$peserta->line}}</b></p>
					              </a>
					            </div>
				          	</div>
				        </div>
				    </div>
				    @else <!-- EVEN -->
					<div class="col s12 m6 l3 card-width animated slideInUp delay-1s">
				        <div class="card card-border center-align gradient-45deg-purple-deep-orange ">
				          	<div class="card-content white-text">
				          		<a href="{{ route('peserta.view', $peserta->id) }}">
					            	<img class="responsive-img circle z-depth-4 hoverable" width="100" src="{{asset('images/peserta/'.$peserta->imageurl)}}" alt="avatar" />
					        	</a>
					            <h5 class="white-text mb-1">{{$peserta->nama}}</h5>
					            <h6 class="white-text"><b>{{$peserta->delegasi}}</b></h6>
					            <div class="row mt-1">
					              <a target="_blank" href="https://www.instagram.com/{{$peserta->instagram}}" class="col s6">
					                <h5 style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);" class="icon-background circle white-text z-depth-2 mx-auto hoverable">
					                  <i class="fab fa-instagram"></i>
					                </h5>
					                <p class="white-text"><b>{{$peserta->instagram}}</b></p>
					              </a>
					              <a target="_blank" href="http://www.line.me/ti/p/~{{$peserta->line}}" class="col s6">
					                <h5 class="icon-background circle gradient-45deg-green-teal white-text z-depth-2 mx-auto hoverable">
					                  <i class="fab fa-line"></i>
					                </h5>
					                <p class="white-text"><b>{{$peserta->line}}</b></p>
					              </a>
					            </div>
				          	</div>
				        </div>
				    </div>
				    @endif
				    @empty
				    <div class="col l12 center">
				    	<span>Peserta not found</span>
				    </div>
			    	@endforelse  	
			    </div>
			    {{ $pesertas->links('vendor.pagination.materialize') }}
		  	</div>
        </div>
    </div>
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script type="text/javascript" src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>
<script src="{{asset('vendors/shepherd-js/shepherd.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script type="text/javascript">
	var pesertas = {
		@foreach($pesertas as $peserta)
	      '{{$peserta->name}}' : null,
	    @endforeach
	};

  	$(document).ready(function(){
  		if ($('#delegasi').find("option[value='{{ $delegasi }}']").length) {
		    $('#delegasi').val("{{ $delegasi }}").trigger('change');
		}
	    $(".select2").select2({
	        /* the following code is used to disable x-scrollbar when click in select input and
	        take 100% width in responsive also */
	        dropdownAutoWidth: true,
	        width: '100%',
	    });
	    $('.modal').modal();
	    $("input.autocomplete").autocomplete({
	    	data : pesertas,
	    });

	    // tour initialize
		var tour = new Shepherd.Tour({
		    defaultStepOptions: {
		      cancelIcon: {
		        enabled: true
		      },
		      classes: 'tour-container',
		      scrollTo: { behavior: 'smooth', block: 'center' }
		    }
		});
		// step 1
		tour.addStep({
		    title: 'Avatar',
		    text: 'Click here to see their details.',
		    attachTo: {
		      element: '.avatar0 ',
		      on: 'right'
		    },
		    buttons: [
		      {
		        action: function () {
		          return this.cancel();
		        },
		        classes: 'btn btn-light-indigo',
		        text: 'Close'
		      }
		    ],
		    id: 'welcome'
		});

		$('.avatars0').on("animationend",function(){
			tour.start();
		});

  	});
</script>
@endsection