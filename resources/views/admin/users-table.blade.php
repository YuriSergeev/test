@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <table border="0" width="100%">
            <tr>
              <th style="float: left;"><a href="{{ route('admin.admin') }}" class="btn btn-primary">All checklists</a></th>
              <th style="float: right;"><a href="{{ route('admin.admins_table') }}" class="btn btn-primary">Admin table</a></th>
            </tr>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <table width="100%">
          <tr>
            <th>Name</th>
            <th>Number of generated check sheets</th>
            @if(Auth::user()->job_title == 'Admin')
              <th>Registered</th>
              <th>Access</th>
            @endif
            <th>Can create check sheets</th>
            <th>Apply</th>
          </tr>

        @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->numberOfCreated }}</td>
            @if(Auth::user()->job_title == 'Admin')
              <td>{{ date('m.n.Y'), strtotime($user->created_at) }}</td>
              <td>
                <form action="{{ route('user.access', ['id'=>$user->id]) }}" method="POST"> @csrf
                  <div class="toggle lg">
                    <button type="submit" style="border:none; background: none;"><input type="checkbox" @if(!$user->access) checked @endif><span class="button-indecator"></span></button>
                  </div>
                </form>
               </td>
            @endif
            <form action="{{ route('edit.data.user') }}" method="POST"> @csrf
              <td>
                <input type="number" class="form-control" name="possibleCreateList" value="{{ $user->possibleCreateList }}">
              </td>
              <td>
                <button type="submit" class="btn btn-primary">Save</button>
              </td>
            </form>
            </tr>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
