@extends('auth.layouts.app')

@section('content')
<form class="login100-form validate-form" id="form_input" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-title">
        Member Login
    </span>

    @php
        $hasError = null;
        $redBorder = false;
        if ($errors->any()) {
            $hasError = true;
            $redBorder = 'border border-danger';
        }
    @endphp

    <div class="wrap-input100 mb-0 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input class="input100 {{ $redBorder }}" type="text" id="username" name="username" placeholder="Username" minlength="5"
            oninvalid="this.setCustomValidity('Kolom Username wajib diisi dan minimal 5 digit')"
            oninput="this.setCustomValidity('')" required>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-at" aria-hidden="true"></i>
        </span>
    </div>
    @if ($errors->has('username'))
    <div id="error_username">
        <small class="ml-4 text-danger">{{ $errors->first('username') }}</small>
    </div>
    @endif

    <div class="wrap-input100 mb-0 mt-3 validate-input" data-validate = "Password is required">
        <input class="input100 {{ $redBorder }}" type="password" id="password" name="password" placeholder="Password" minlength="5"
            oninvalid="this.setCustomValidity('Kolom Password wajib diisi dan minimal 5 digit')"
            oninput="this.setCustomValidity('')" required>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    @if ($errors->has('password'))
    <div id="error_password">
        <small class="ml-4 text-danger">{{ $errors->first('password') }}</small>
    </div>
    @endif
    
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Login
        </button>
    </div>

    {{-- <div class="text-center p-t-12">
        <span class="txt1">
            Forgot
        </span>
        <a class="txt2" href="#">
            Username / Password?
        </a>
    </div> --}}

    <div class="text-center p-t-136">
        {{-- <a class="txt2" href="#">
            Create your Account
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a> --}}
    </div>
</form>
@endsection

@push('custom-scripts')
    <script>
        $(function() {
            if ('{{ $hasError }}') {
                let column = ['username', 'password'];
                column.forEach(el => {
                    $('#' + el).on('keyup change', function() {
                        if ($(this).val().length === 0) {
                            $(this).removeClass('border-success');
                            $(this).addClass('border-danger');
                        } else {
                            $(this).removeClass('border-danger');
                            $(this).addClass('border-success');
                        }
                        $('#error_' + el).slideUp();
                    });
                });
            }
        });
    </script>
@endpush