{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Manage Peserta')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/extensions/Responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/select2/select2-materialize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/form-select2.css') }}">

<!-- Button  -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>

@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/datatable.css')}}"> 
<style type="text/css">
  .btnAction {
    padding-left: 10%;
    padding-right: 10%;
  }
  .btnActionForm {
    padding-left: 26%;
    padding-right: 26%;
  }
</style>
@endsection

{{-- page content --}}
@section('content')
<div class="row datatable-wrapper">
  <div class="col s12 m12 l12 datatable-table animated fadeIn slow">
      <div class="section">
        <div class="card border-radius-6">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m12 l12">
                <div style="bottom: 60px; right: 20px;" class="fixed-action-btn direction-top">
                  <a class="btn-floating btn-large gradient-45deg-purple-deep-purple gradient-shadow modal-trigger" href="{{ route('peserta.add') }}"><i class="material-icons">add</i></a>
                </div>
              </div>
              <div class="col s12 m12 l12 pl-1 pr-1">
                <div class="col s12 m12 l12 responsive-table pl-0 pr-0 animated zoomIn delay-1s">
                  <table id="peserta-datatable" class="table highlight ">
                    <thead>
                      <tr>
                        <th>Avatar</th>
                        <th>Nama</th>
                        <th>Panggilan</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Delegasi</th>
                        <th>KBK</th>
                        <th>Kelompok</th>
                        <th>TTL</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Asal</th>
                        <th>Alamat Kost</th>
                        <th>Agama</th>
                        <th>Hobby</th>
                        <th>Motto</th>
                        <th>Line</th>
                        <th>Whatsapp</th>
                        <th>Instagram</th>
                        <th>Twitter</th>
                        <th>LinkedIn</th>
                        <th>Github</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($pesertas as $peserta)
                        <tr>
                          <td><img class="materialboxed" src="{{ asset('images/peserta/' . $peserta->imageurl . '') }}" width="96" height="96"></td>
                          <td>{{ $peserta->nama }}</td>
                          <td>{{ $peserta->panggilan }}</td>
                          <td>{{ $peserta->nim }}</td>
                          <td>{{ $peserta->jurusan }}</td>
                          <td>{{ $peserta->delegasi }}</td>
                          <td>{{ $peserta->kbk }}</td>
                          <td>{{ $peserta->kelompok }}</td>
                          <td>{{ $peserta->tempat_lahir }}, {{ $peserta->tanggal_lahir->format('d M Y') }}</td>
                          <td>{{ $peserta->email }}</td>
                          <td>{{ $peserta->jenis_kelamin }}</td>
                          <td>{{ $peserta->asal }}</td>
                          <td>{{ $peserta->alamat_kost }}</td>
                          <td>{{ $peserta->agama }}</td>
                          <td>{{ $peserta->hobi }}</td>
                          <td>{{ $peserta->motto }}</td>
                          <td>{{ $peserta->line }}</td>
                          <td>{{ $peserta->whatsapp }}</td>
                          <td>{{ $peserta->instagram }}</td>
                          <td>{{ $peserta->twitter }}</td>
                          <td>{{ $peserta->linkedin }}</td>
                          <td>{{ $peserta->github }}</td>
                          <td style="width: 170px;">
                            <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn amber lighten-1 btnAction waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                            @if(auth()->user()->id == 1)
<a href="#delete{{$peserta->id}}" class="btn red darken-2 btnAction waves-effect waves-dark modal-trigger tooltipped" data-position="bottom" data-tooltip="Delete"><i class="material-icons">delete</i></a>
  <!-- START Modal Delete Confirmation -->
  <div class="modal border-radius-6 width-30 pb-2" id="delete{{$peserta->id}}">
      <div class="modal-content">
        <div class="col s12 m12 l12">
          <h5>Are you sure?</h5>
          <form method="POST" action="{{ route('peserta.delete', $peserta->id) }}" class="right pt-4">
            @csrf
            <a href="#!" class="btn grey lighten-2 modal-action modal-close waves-effect waves-dark" style="color: #555">Cancel
            </a>
            <button type="submit" class="btn deep-purple accent-2 waves-effect waves-light">Yes, Delete</button>
          </form>
        </div>
      </div>
  </div>
  <!-- END Modal Delete Confirmation -->
                            @endif
                            <a href="{{ route('peserta.view', $peserta->id) }}" class="btn btnAction waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="view"><i class="material-icons">remove_red_eye</i></a></a>
                          </td>
                        </tr>
                      @empty
                      <tr>
                        <td></td>
                        <td></td>
                        <td colspan="4" class="center">Data Empty</td>
                        <td></td>
                        <td></td>
                      </tr>
                      @endforelse
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>

<!-- Button  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

@endsection

{{-- page scripts --}}
@section('page-script')
<script type="text/javascript">

  var dat = [];

  $(document).ready(function(){
    $(".select2").select2({
        /* the following code is used to disable x-scrollbar when click in select input and
        take 100% width in responsive also */
        dropdownAutoWidth: true,
        width: '100%',
    });
    $('.modal').modal();
    $('.materialboxed').materialbox();

    $("#peserta-datatable").DataTable({
        responsive: true,
        autoWidth : false,
        processing: true,
        pageLength: 10,
        dom: '<Bf><t><lrip<"clear">>',
        buttons: [
          {
            extend : 'excel',
            text : 'Export to Excel',
            exportOptions: {
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20, 21 ]
            }
          },
        ],
        columnDefs : [
          {
              "targets" : [ 2, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21 ],
              "visible" : false,
              "searchable" : false
          },
        ],
        'initComplete': function(){
            var api = this.api();

            $('.dataTables_filter', api.table().container()).addClass('mr-2');
            $('.dataTables_filter input[type="search"] ', api.table().container()).wrap("<div class='input-field'></div>");
            $('.dt-buttons button').removeClass("dt-button");
            $('.dt-buttons button').addClass("btn");
        }
    });

  });
</script>
@endsection