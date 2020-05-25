{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
@php
// confiData variable layoutClasses array in Helper.php file.
$configData = Helper::applClasses();
@endphp
<html class="loading"
  lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
  data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}">
<!-- BEGIN: Head-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="title" content="LKMMD FT UNDIP | LKMM Dasar Fakultas Teknik UNDIP">
  <meta name="description" content="LKMMD FT UNDIP ( Latihan Keterampilan dan Manajemen Mahasiswa Tingkat Dasar Fakultas Teknik Universitas Diponegoro ) adalah salah satu latihan kepemimpinan yang ada di Fakultas Teknik Universitas Diponegoro yang digunakan sebagai wadah mahasiswa untuk memahami peran dalam organisasi dan melatih diri dalam manajerial organisasi.">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.lkmmdftundip2020.my.id/">
  <meta property="og:title" content="LKMMD FT UNDIP | LKMM Dasar Fakultas Teknik UNDIP">
  <meta property="og:description" content="LKMMD FT UNDIP ( Latihan Keterampilan dan Manajemen Mahasiswa Tingkat Dasar Fakultas Teknik Universitas Diponegoro ) adalah salah satu latihan kepemimpinan yang ada di Fakultas Teknik Universitas Diponegoro yang digunakan sebagai wadah mahasiswa untuk memahami peran dalam organisasi dan melatih diri dalam manajerial organisasi.">
  <meta property="og:image" content="{{asset('images/LKMMDFTUNDIP2020.png')}}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://www.lkmmdftundip2020.my.id/">
  <meta property="twitter:title" content="LKMMD FT UNDIP | LKMM Dasar Fakultas Teknik UNDIP">
  <meta property="twitter:description" content="LKMMD FT UNDIP ( Latihan Keterampilan dan Manajemen Mahasiswa Tingkat Dasar Fakultas Teknik Universitas Diponegoro ) adalah salah satu latihan kepemimpinan yang ada di Fakultas Teknik Universitas Diponegoro yang digunakan sebagai wadah mahasiswa untuk memahami peran dalam organisasi dan melatih diri dalam manajerial organisasi.">
  <meta property="og:image" content="{{asset('images/LKMMDFTUNDIP2020.png')}}">
  <meta name="keywords" content="latihan kepemimpinan, lkmmd, lkmmd undip, lkmm dasar, lkmmd ft undip, fakultas teknik, teknik, undip">

  <title>@yield('title') | LKMMD FT UNDIP 2020</title>
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('images/favicon/site.webmanifest')}}">

  {{-- Include core + vendor Styles --}}
  @include('panels.styles')

</head>
<!-- END: Head-->

{{-- @isset(config('custom.custom.mainLayoutType'))
@endisset --}}
@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
@include(($configData['mainLayoutType'] === 'horizontal-menu') ? 'layouts.horizontalLayoutMaster':
'layouts.verticalLayoutMaster')
@else
{{-- if mainLaoutType is empty or not set then its print below line  --}}
<h1>{{'mainLayoutType Option is empty in config custom.php file.'}}</h1>
@endif

</html>