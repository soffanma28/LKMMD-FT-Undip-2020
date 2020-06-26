{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Login')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
<style type="text/css">
    body {
        background-image: url('images/undipwp.jpg') !important;
        background-size: contain;
    }
</style>
@endsection

{{-- page content --}}
@section('content')
<div id="login-page" class="row">
    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12 mt-6">
                    <a href="{{ route('peserta.main') }}" class="center" style="display: inline-flex;height: 56px;width: auto;align-items: center;justify-content: center;">
                        <img class="hide-on-med-and-down center" width="48" src="{{asset('images/logo/logolkmmdftundip2020HD.png')}}" alt="logo lkmmdft" />
                        <span class="center pl-2" style="font-size: 32px;font-style: bold;font-weight: 700;">LKMMD FT UNDIP 2020</span>
                        <img class="hide-on-med-and-down center" width="64" src="{{asset('images/logo/logoundip.png')}}" alt="logo lkmmdft" />
                    </a>
                    <h5 class="mb-0 mt-6 ml-4">LOGIN</h5>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-2">person_outline</i>
                    <input id="username" type="text" class=" @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required autocomplete="username" autofocus>
                    <label for="username" class="center-align">{{ __('Username') }}</label>
                    @error('username')
                    <small class="red-text ml-10" role="alert">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-2">lock_outline</i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    <label for="password">{{ __('Password') }}</label>
                    @error('password')
                    <small class="red-text ml-10" role="alert">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 ml-2 mt-1">
                    <p>
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Remember Me</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit"
                        class="btn waves-effect waves-light border-round gradient-45deg-indigo-purple col s12">Login
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small">
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection