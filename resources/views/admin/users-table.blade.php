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
            <th>Registered</th>
            <th>Access</th>
            <th>Can create check sheets</th>
          </tr>

        @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->numberOfCreated }}</td>
            <td>{{ date('m.n.Y'), strtotime($user->created_at) }}</td>
            <td>
              <form id="condition" action="{{ route('user.access', ['id'=>$user->id]) }}" method="POST">
                <div class="toggle lg">
                  <button style="all: unset;" type="submit" style="border:none; background: none;"><input type="checkbox" @if(!$user->access) checked @endif><span class="button-indecator"></span></button>
                </div>
                @csrf
              </form>
             </td>
              <td>
                <form id="listSize" action="{{ route('edit.data.user', ['id'=>$user->id]) }}" method="POST" сlass="row">
                  <table border="0" width="100%">
                    <tr>
                      <th><input type="number" class="form-control" name="possibleCreateList" value="{{ $user->possibleCreateList }}"></th>
                      <th><button type="submit" class="btn btn-primary">Save</button></th>
                    <tr>
                  </table>
                  @csrf
                </form>
              </td>
            </tr>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
