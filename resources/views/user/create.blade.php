@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('home.store')}}" method="POST">
            <div class="card">
                <div class="card-header">
                    <label class="control-label">@lang('app.title')</label>
                    <input type="text" class="form-control" name="title" value="{{ $title }}" required autofocus>
                </div>
            </div>
            @for ($i=1; $i <= $size; $i++)
              <div class="card">
                <div class="card-body">
                  <label class="control-label">{{ $i }} @lang('app.item')</label>
                  <input type="text" class="form-control" name="{{ $i }}" required>
                </div>
              </div>
            @endfor
            <div class="card">
              <div class="card-header">
                <input type="hidden" name="size" value="{{ $size }}">
                <button type="submit" class="btn btn-primary" style="float: right; margin-top: 5px;">@lang('app.create_list')</button>
                {{ csrf_field() }}
              </div>
            </div>

          </form>
        </div>
    </div>
</div>
@endsection
