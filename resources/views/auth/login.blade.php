@extends('auth.layouts.app')

@push('form')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-title">
        Member Login
    </span>

    @php
        $redBorder = null;
        if ($errors->any()) {
            $redBorder = 'border border-danger';
        }
    @endphp

    <div class="wrap-input100 mb-0 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input class="input100 {{ $redBorder }}" type="text" name="username" placeholder="Username" minlength="5"
            oninvalid="this.setCustomValidity('Kolom Username wajib diisi')"
            oninput="this.setCustomValidity('')" required>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-at" aria-hidden="true"></i>
        </span>
    </div>
    @if ($errors->has('username'))
        <small class="ml-4 text-danger">{{ $errors->first('username') }}</small>
    @endif

    <div class="wrap-input100 mt-3 validate-input" data-validate = "Password is required">
        <input class="input100 {{ $redBorder }}" type="password" name="password" placeholder="Password"
            oninvalid="this.setCustomValidity('Kolom Password wajib diisi')"
            oninput="this.setCustomValidity('')" required>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    @if ($errors->has('password'))
        <small class="ml-4 text-danger">{{ $errors->first('password') }}</small>
    @endif
    
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Login
        </button>
    </div>

    <div class="text-center p-t-12">
        <span class="txt1">
            Forgot
        </span>
        <a class="txt2" href="#">
            Username / Password?
        </a>
    </div>

    <div class="text-center p-t-136">
        {{-- <a class="txt2" href="#">
            Create your Account
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a> --}}
    </div>
</form>
@endpush