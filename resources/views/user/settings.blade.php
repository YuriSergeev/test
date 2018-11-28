@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <label>Settings</label>
        </div>
        <div class="card-body">
          <div class="form-group col-md-5">
            <label class="control-label">@lang('app.name'):</label>
            <input type="text" class="form-control" name="title" value="{{ Auth::user()->name }}" required autofocus>
          </div>
          <div class="form-group col-md-5">
            <label class="control-label">@lang('app.size'):</label>
            <input type="number" class="form-control" name="size" value="{{ old('size') }}" required>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
