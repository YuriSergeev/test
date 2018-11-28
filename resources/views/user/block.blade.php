@extends('layouts.app')

@section('content')
  @if(Auth::user()->access == true)
    <h1 style="text-align: center;">@lang('home.access_open')</h1>
  @else
    <h1 style="text-align: center;">@lang('home.access_denied')</h1>
  @endif
@endsection
