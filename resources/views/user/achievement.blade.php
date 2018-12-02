@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <p style="text-align: center;">@lang('app.achievement')</p>
        </div>
        <div class="card-body">
          @if(Auth::user()->hasAchievement('Multitasking'))
            <div class="box"><p>@lang('app.multitasking') - @lang('app.multitasking_lang')</p></div>
          @endif
          @if(Auth::user()->hasAchievement('The first went'))
            <div class="box"><p>@lang('app.the_first_went') - @lang('app.first_went_lang')</p></div>
          @endif
          @if(Auth::user()->hasAchievement('Measure seven times cut once'))
            <div class="box"><p>@lang('app.measure_seven') - @lang('app.measure_seven_lang')</p></div>
          @endif
          @if(Auth::user()->hasAchievement('Cleaner'))
            <div class="box"><p>@lang('app.cleaner') - @lang('app.cleaner_lang')</p></div>
          @endif
          @if(Auth::user()->hasAchievement('Scheduler'))
            <div class="box"><p>@lang('app.scheduler') - @lang('app.scheduler_lang')</p></div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
