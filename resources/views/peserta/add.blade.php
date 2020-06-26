{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Add Peserta')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2-materialize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/form-select2.css') }}">
@endsection

{{-- page styles --}}
@section('page-style')
<style type="text/css">
	.croppie-container .cr-viewport, .croppie-container .cr-resizer {
		box-shadow: 0 0 2000px 2000px rgba(255, 255, 255, 1);
	}
</style>
@endsection

{{-- page content --}}
@section('content')
<div class="row">
  	<div class="col s12 m12 l12 animated fadeInRight slow">
      <div class="section pb-0 pt-0">
        <div class="card border-radius-6">
          	<div class="card-content">
	            <div class="row">
	            	<form method="POST" action="{{ route('peserta.store') }}" enctype="multipart/form-data">
			            @csrf
		            	<div class="col s12 m12 l12 animated zoomIn slower">
		            		<span class="card-title left">Add Peserta</span>
		            		<button class="btn deep-purple accent-2 waves-effect waves-light right" type="submit" name="action">Add
	          				</button>
	              			<a href="{{ route('peserta.index') }}" class="btn grey lighten-2 waves-effect waves-light right mr-1" style="color: #555">Back
	          				</a>
		            	</div>
		              	<div class="col s12 m12 l6">
		              		<div class="row">
			              		<div class="media display-flex align-items-center input-field col s12 m12 l12 animated fadeInUp delay-2s">
						            <div class="mr-5 ml-5">
						              <div id="upload-avatar" class=""></div>
						              <input id="avatar" type="hidden" name="avatar">
						            </div>
						            <div class="file-field">
						              <h5 class="mt-0">Avatar</h5>
						              <div class="">
						              	<div class="btn-small deep-purple accent-2 waves-effect waves-light">
									        <span>Change</span>
									        <input id="upload" type="file">
									    </div>
						              </div>
						            </div>
						        </div>
						        <div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
						          	<textarea id="Bio" name="bio" class="materialize-textarea"></textarea>
						          	<label for="Bio">Bio</label>
						        </div>
			              		<div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="text" name="nama" id="nama" class="validate" required>
					            	<label for="nama">Nama</label>
							    </div>
			              		<div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="text" name="panggilan" id="panggilan" class="validate" required>
					            	<label for="panggilan">Panggilan</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="number" name="nim" id="nim" class="validate" required>
					            	<label for="nim">NIM</label>
							    </div>
							    <div class="input-field col s12 m12 l12">
							    	<select id="jk" name="jenis_kelamin" required>
								      <option value="" disabled selected>Choose your option</option>
								      <option value="Laki - Laki">Laki - Laki</option>
								      <option value="Perempuan">Perempuan</option>
								    </select>
								    <label for="jk">Jenis Kelamin</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="text" name="asal" id="asal" class="validate" required>
					            	<label for="asal">Asal Daerah</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="text" name="alamat_kost" id="alamat_kost" class="validate" required>
					            	<label for="alamat_kost">Alamat Kost</label>
							    </div>
			              	</div>
		              	</div>
		              	<div class="col s12 m12 l6">
		              		<div class="row">
		              			<div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<select class="select2 browser-default" name="jurusan" required>
									    <option value="" selected>Jurusan</option>
									    <option value="Teknik Sipil">Teknik Sipil</option>
									    <option value="Arsitektur">Arsitektur</option>
									    <option value="Teknik Kimia">Teknik Kimia</option>
									    <option value="Perencanaan Wilayah dan Kota">Perencanaan Wilayah dan Kota</option>
									    <option value="Teknik Mesin">Teknik Mesin</option>
									    <option value="Teknik Elektro">Teknik Elektro</option>
									    <option value="Teknik Industri">Teknik Industri</option>
									    <option value="Teknik Lingkungan">Teknik Lingkungan</option>
									    <option value="Teknik Perkapalan">Teknik Perkapalan</option>
									    <option value="Teknik Geodesi">Teknik Geodesi</option>
									    <option value="Teknik Geologi">Teknik Geologi</option>
									    <option value="Teknik Komputer">Teknik Komputer</option>
									    <option value="(FKM) Kesehatan Masyarakat">(FKM) Kesehatan Masyarakat</option>
									    <option value="(FPIK) Ilmu kelautan">(FPIK) Ilmu kelautan</option>
									    <option value="(FISIP) Administrasi Bisnis">(FISIP) Administrasi Bisnis</option>
									    <option value="(SV) D4 Teknik Infrastruktur Sipil dan Perancangan Arsitektur">(SV) D4 Teknik Infrastruktur Sipil dan Perancangan Arsitektur</option>
									</select>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<select class="select2 browser-default" name="delegasi" required>
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
									    <option value="HMA Amoghasida">HMA Amoghasida</option>
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
							    <!-- KBK & Kelompok  -->
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l9">
			              			<select id="kbk" class="select2 browser-default" name="kbk">
									    <option value="" selected>KBK</option>
									    <option value="KWU (Kewirausahaan)">KWU (Kewirausahaan)</option>
									    <option value="PM (Pemberdayaan Masyarakat)">PM (Pemberdayaan Masyarakat)</option>
									    <option value="RINOV (Riset dan Inovasi)">RINOV (Riset dan Inovasi)</option>
									    <option value="PR (Public Relation)">PR (Public Relation)</option>
									    <option value="PKP (Politik Kebijakan Publik)">PKP (Politik Kebijakan Publik)</option>
									    <option value="MMRO (Manajemen Manusia dan Rekayasa Organisasi)">MMRO (Manajemen Manusia dan Rekayasa Organisasi)</option>
									</select>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l3">
			              			<select id="kelompok" class="select2 browser-default" name="kelompok">
									    <option value="" selected>Kelompok</option>
									    <option value="1">1</option>
									    <option value="2">2</option>
									    <option value="3">3</option>
									    <option value="4">4</option>
									    <option value="5">5</option>
									    <option value="6">6</option>
									    <option value="7">7</option>
									    <option value="8">8</option>
									    <option value="9">9</option>
									    <option value="10">10</option>
									</select>
							    </div>
		              			<div class="input-field col s12 m12 l12">
			              			<select id="agama" name="agama" required>
								      <option value="" disabled selected>Choose your option</option>
								      <option value="Islam">Islam</option>
								      <option value="Kristen Protestan">Kristen Protestan</option>
								      <option value="Katolik">Katolik</option>
								      <option value="Hindu">Hindu</option>
								      <option value="Buddha">Buddha</option>
								      <option value="Kong Hu Cu">Kong Hu Cu</option>
								      <option value="Other">Other</option>
								    </select>
								    <label for="agama">Agama</label>
							    </div>
			              		<div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<input type="text" name="tempat_lahir" id="tempat_lahir" class="validate" required>
					            	<label for="tempat_lahir">Tempat Lahir</label>
							    </div>
			              		<div class="input-field col s12 m12 l6">
			              			<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="datepicker validate" required>
					            	<label for="tanggal_lahir">Tanggal Lahir</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="text" name="hobi" id="hobi" class="validate">
					            	<label for="hobi">Hobi</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="text" name="motto" id="motto" class="validate">
					            	<label for="motto">Motto</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l12">
			              			<input type="email" name="email" id="email" class="validate" required>
					            	<label for="email">Email</label>
							    </div>
			              		<div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<input type="text" name="github" id="github" class="validate">
					            	<label for="github">Github (optional)</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<input type="text" name="instagram" id="instagram" class="validate">
					            	<label for="instagram">Instagram (optional)</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<input type="number" name="whatsapp" id="whatsapp" class="">
					            	<label for="whatsapp">Whatsapp (optional)</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<input type="text" name="line" id="line" class="validate">
					            	<label for="line">Line (optional)</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<input type="text" name="twitter" id="twitter" class="validate">
					            	<label for="twitter">Twitter (optional)</label>
							    </div>
							    <div class="input-field animated fadeInRight delay-1s col s12 m12 l6">
			              			<input type="text" name="linkedin" id="linkedin" class="validate">
					            	<label for="linkedin">LinkedIn (optional)</label>
							    </div>
			              	</div>
		              	</div>
	              	</form>
	            </div>
          	</div>
        </div>
      </div>
  	</div>
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script type="text/javascript" src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script type="text/javascript">
	$(document).ready(function(){

		$(".select2").select2({
	        /* the following code is used to disable x-scrollbar when click in select input and
	        take 100% width in responsive also */
	        dropdownAutoWidth: true,
	        width: '100%',
	    });
	    $('.datepicker').datepicker({
	    	'defaultDate' : new Date(2001,0,1),
	    	'setDefaultDate' : true,
	    	'yearRange' : 5,
	    });
		$('.dropify').dropify();
		$uploadCrop = $('#upload-avatar').croppie({
		    enableExif: true,
		    url: '../../images/defaultimage.png',
		    viewport: {
		        width: 192,
		        height: 192,
		        type: 'circle'
		    },
		    showZoomer: false,
		    boundary: {
		        width: 192,
		        height: 192
		    }
		});
		$('#upload').on('change', function () { 
			var reader = new FileReader();
		    reader.onload = function (e) {
		    	$uploadCrop.croppie('bind', {
		    		url: e.target.result
		    	}).then(function(){
		    		console.log('jQuery bind complete');
		    	});
		    }
		    reader.readAsDataURL(this.files[0]);
		});
		$('#upload-avatar').on('update.croppie', function(ev, cropData) {
			$uploadCrop.croppie('result', {
			    type: 'canvas',
			    format : 'png',
			    quality : 0.8,
			    size: {	width: 700, height: 700}
			}).then(function (resp) {
			    $('#avatar').val(resp);
			});
		});
		$('#jk').formSelect();
		$('#agama').formSelect();

	});
</script>
@endsection

