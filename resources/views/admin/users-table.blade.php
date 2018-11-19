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
                      <th style="float: right;"><a href="{{ route('admin.users_table') }}" class="btn btn-primary">User management</a></th>
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
                    <th>Apply</th>
                  </tr>
              @foreach($users as $user)
                <form action="{{ route('edit.data.user') }}" method="POST" class="row">
                  {{ csrf_field() }}
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->numberOfCreated }}</td>
                      <td>{{ date('m.n.Y'), strtotime($user->created_at) }}</td>
                      <td>
                        <form></form>
                        <form action="{{ route('user.access', ['id'=>$user->id]) }}" method="POST">
                            <div class="toggle lg">
                                <button type="submit" style="border:none; background: none;"><input type="checkbox" @if($user->access) checked @endif><span class="button-indecator"></span></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                      </td>
                      <td>
                          <input type="number" class="form-control" name="possibleCreateList" value="{{ $user->possibleCreateList }}">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </td>
                    </tr>
                  <input type="hidden" name="id" value="{{ $user->id }}">
                </form>
              @endforeach
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
