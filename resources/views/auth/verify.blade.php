@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify-email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.verify-email-message') }}
                        </div>
                    @endif

                    {{ __('auth.verfiy-email-notify') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend' , app()->getLocale()) }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection