@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                  <form action="{{ route('item.update', $item->id) }}" method="POST">
                      <input type="text" class="form-control" name="description" value="{{ $item->description }}" required autofocus>
                      <button type="submit" class="btn btn-primary" style="float: right; margin-top: 5px;">Add item</button>
                      {{ method_field('PUT') }}
                      {{ csrf_field() }}
                  </form>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
