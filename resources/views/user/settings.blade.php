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
          <form enctype="multipart/form-data" action="{{ route('update.settings') }}" method="POST">
            <div class="row mb-4">
              <div class="col-md-4">
                <img src="storage/avatars/{{ Auth::user()->avatar }}" width="150px">
              </div>
              <div class="col-md-4">
                <label for="exampleInputFile">Image input</label>
                <input name="avatar" class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp">
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <label>Name</label>
                <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}">
              </div>
            </div>
            @csrf
            <div class="row mb-10">
              <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
