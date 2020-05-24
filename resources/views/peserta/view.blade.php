{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Detail')

{{-- vendor styles --}}
@section('vendor-style')
@endsection

{{-- page styles --}}
@section('page-style')
<style type="text/css">
  .collection .collection-item.avatar {
    min-height: 64px;
  }
</style>
@endsection

{{-- page content --}}
@section('content')
<div class="section">
  <div class="card-panel mb-0 animated fadeInLeft">
    <div class="row">
      <div class="col s12 m7">
        <div class="display-flex media">
          <a href="#" class="avatar">
            <img src="{{asset('images/peserta/'.$peserta->imageurl)}}" alt="users view avatar" class="materialboxed z-depth-4 circle animated fadeInLeft delay-1s"
              height="128" width="128">
          </a>
          <div class="media-body ml-4 animated fadeInLeft delay-1s">
            <h4 class="media-heading">
              <span class="users-view-name">{{$peserta->nama}}</span>
              @if($peserta->jenis_kelamin == "Laki - Laki")
              <i class="fas fa-mars" style="color: #2196f3"></i>
              @else 
              <i class="fas fa-venus" style="color: #f06292"></i>
              @endif
            </h4>
            <h5 class="users-view-id">{{$peserta->delegasi}}</h5>
          </div>
        </div>
      </div>
      <div class="col s12 m5 animated fadeInRight delay-1s">
        <h6>About Me</h6>
        <p>{{ $peserta->bio }}</p>
        <!-- <a href="#" class="btn-small btn-light-indigo"><i class="material-icons">mail_outline</i></a> -->
      </div>
    </div>
  </div>

  <!-- users view card details start -->
  <div class="col s12 m12 l6 pl-1 pr-1 animated fadeInUp">
    <div class="card">
      <div class="card-content">
        <h6 class="mb-2 mt-2"><i class="material-icons deep-purple-text">error_outline</i> Personal Info</h6>
        <div class="row">
          <div class="col s12 m12 l12">
            <ul class="collection">
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">cake</i>
                <span class="title orange-text"><b>Birthday</b></span>
                <p>{{$peserta->tempat_lahir}}, {{$peserta->tanggal_lahir->format('d F Y')}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">account_box</i>
                <span class="title orange-text"><b>Panggilan</b></span>
                <p>{{$peserta->panggilan}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">account_box</i>
                <span class="title orange-text"><b>NIM</b></span>
                <p>{{$peserta->nim}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">school</i>
                <span class="title orange-text"><b>Jurusan</b></span>
                <p>{{$peserta->jurusan}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">home</i>
                <span class="title orange-text"><b>Asal</b></span>
                <p>{{$peserta->asal}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">store</i>
                <span class="title orange-text"><b>Alamat Kost</b></span>
                <p>{{$peserta->alamat_kost}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">email</i>
                <span class="title orange-text"><b>Email</b></span>
                <p>{{$peserta->email}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">public</i>
                <span class="title orange-text"><b>Agama</b></span>
                <p>{{$peserta->agama}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">favorite</i>
                <span class="title orange-text"><b>Hobi</b></span>
                <p>{{$peserta->hobi}}</p>
              </li>
              <li class="collection-item avatar animated fadeInUp delay-1s">
                <i class="material-icons circle" style="color: #ff9800;background-color: #FFFFFF;">view_carousel</i>
                <span class="title orange-text"><b>Motto</b></span>
                <p>{{$peserta->motto}}</p>
              </li>
            </ul>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
  <div class="col s12 m12 l6 pl-1 pr-1 animated fadeInRight">
    <div class="card">
      <div class="card-content">
        <h6 class="mb-2 mt-2"><i class="material-icons deep-purple-text">link</i> Social Links</h6>
        <div class="row">
          <div class="col s12 m12 l12">
            <a target="_blank" href="https://www.instagram.com/{{$peserta->instagram}}" class="col s6 m6 l4 center animated fadeInRight delay-1s slow">
              <h5 style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);" class="icon-background circle white-text z-depth-2 mx-auto hoverable">
                <i class="fab fa-instagram"></i>
              </h5>
              <p class="deep-purple-text"><b>{{$peserta->instagram}}</b></p>
            </a>
            <a target="_blank" href="http://www.line.me/ti/p/~{{$peserta->line}}" class="col s6 m6 l4 center animated fadeInRight delay-1s slow">
              <h5 class="icon-background circle gradient-45deg-green-teal white-text z-depth-2 mx-auto hoverable">
                <i class="fab fa-line"></i>
              </h5>
              <p class="deep-purple-text"><b>{{$peserta->line}}</b></p>
            </a>
            @php $whatsapp = ltrim($peserta->whatsapp, '0'); @endphp
            <a target="_blank" href="https://www.wa.me/62{{$whatsapp}}" class="col s6 m6 l4 center animated fadeInRight delay-1s slow">
              <h5 class="icon-background circle white-text z-depth-2 mx-auto hoverable" style="background-color: #25d366;">
                <i class="fab fa-whatsapp"></i>
              </h5>
              <p class="deep-purple-text"><b>{{$peserta->whatsapp}}</b></p>
            </a>
            <a target="_blank" href="https://www.github.com/{{$peserta->github}}" class="col s6 m6 l4 center animated fadeInRight delay-1s slower">
              <h5 class="icon-background circle white-text z-depth-2 mx-auto hoverable" style="background-color: #333;">
                <i class="fab fa-github"></i>
              </h5>
              <p class="deep-purple-text"><b>{{$peserta->github}}</b></p>
            </a>
            <a target="_blank" href="https://www.twitter.com/{{$peserta->twitter}}" class="col s6 m6 l4 center animated fadeInRight delay-1s slower">
              <h5 class="icon-background circle white-text z-depth-2 mx-auto hoverable" style="background-color: #00aced;">
                <i class="fab fa-twitter"></i>
              </h5>
              <p class="deep-purple-text"><b>{{$peserta->twitter}}</b></p>
            </a>
            <a target="_blank" href="https://www.linkedin.com/in/{{$peserta->linkedin}}" class="col s6 m6 l4 center animated fadeInRight delay-1s slower">
              <h5 class="icon-background circle white-text z-depth-2 mx-auto hoverable" style="background-color: #2867B2;">
                <i class="fab fa-linkedin"></i>
              </h5>
              <p class="deep-purple-text"><b>{{$peserta->linkedin}}</b></p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- users view card details ends -->

</div>
@endsection

{{--vendor scripts  --}}
@section('vendor-script')
@endsection

{{-- page scripts --}}
@section('page-script')
<script type="text/javascript">
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>
@endsection