@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <p style="text-align: center;">@lang('app.achievement')</p>
        </div>
        <div class="card-body row">
          @if(Auth::user()->hasAchievement('Multitasking'))
            <div class="box box-1">
              <img width="150px" style="margin-left: 30px;" src="{{ asset('image/achievement/multitasking.png') }}">
              <div class="box-title">
                @lang('app.multitasking') - @lang('app.multitasking_lang')
              </div>
            </div>
          @endif
          @if(Auth::user()->hasAchievement('The first went'))
            <div class="box box-1">
              <img width="150px" style="margin-left: 30px;" src="{{ asset('image/achievement/rocket.png') }}">
              <div class="box-title">
                @lang('app.the_first_went') - @lang('app.first_went_lang')
              </div>
            </div>
          @endif
          @if(Auth::user()->hasAchievement('Measure seven times cut once'))
            <div class="box box-1">
              <img width="150px" style="margin-left: 30px;" src="{{ asset('image/achievement/seven.png') }}">
              <div class="box-title">
                @lang('app.measure_seven') - @lang('app.measure_seven_lang')
              </div>
            </div>
          @endif
          @if(Auth::user()->hasAchievement('Cleaner'))
            <div class="box box-1">
              <img width="150px" style="margin-left: 30px;" src="{{ asset('image/achievement/cleaner.png') }}">
              <div class="box-title">
                @lang('app.cleaner') - @lang('app.cleaner_lang')
              </div>
            </div>
          @endif
          @if(Auth::user()->hasAchievement('Scheduler'))
            <div class="box box-1">
              <img width="150px" style="margin-left: 30px;" src="{{ asset('image/achievement/scheduler.png') }}">
              <div class="box-title">
                @lang('app.scheduler') - @lang('app.scheduler_lang')
              </div>
            </div>
          @endif
            <div class="box box-1">
              <img width="150px" style="margin-left: 30px;" src="{{ asset('image/achievement/lock.png') }}">
              <div class="box-title">
                @lang('app.lock')
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
