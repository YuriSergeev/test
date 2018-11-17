@extends('layouts.app')

@section('content')
  @if(Auth::user()->access == true)
    <h1 style="text-align: center;">Access open</h1>
  @else
    <h1 style="text-align: center;">Access denied</h1>
  @endif
@endsection
