@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('verify.verify')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('verify.sent_to_email')
                        </div>
                    @endif

                    @lang('verify.before_proceeding')
                    @lang('verify.click_here'), <a href="{{ route('verification.resend') }}"></a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
