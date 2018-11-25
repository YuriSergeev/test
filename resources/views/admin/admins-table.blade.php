@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <table border="0" width="100%">
            <th style="float: left;"><a href="{{ route('admin.admin') }}" class="btn btn-primary">All checklists</a></th>
            <th style="float: right;"><a href="{{ route('admin.users_table') }}" class="btn btn-primary">User management</a></th>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <table width="100%">
            <thead>
              <th>Name</th>
              <th>Role</th>
              <th>E-Mail</th>
              <th>Access</th>
              <th></th>
            </thead>
            <tbody>
            @foreach($users as $user)
              {{-- @if($user->role == 'User') @continue @endif --}}
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <form id="admin_access" action="{{ route('admin.access') }}" method="POST"> @csrf
                    <table width="100%">
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <td>User: <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                      <td>Moderator: <input type="checkbox" {{ $user->hasRole('Moderator') ? 'checked' : '' }} name="role_moderator"></td>
                      <td>Admin: <input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                      <td><button type="submit">Assign Roles</button></td>
                    </table>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
