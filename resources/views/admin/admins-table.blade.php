@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <table border="0" width="100%">
            <th style="float: left;"><a href="{{ route('admin.admin') }}" class="btn btn-primary">@lang('admin.all_checklists')</a></th>
            <th style="float: right;"><a href="{{ route('admin.users_table') }}" class="btn btn-primary">@lang('admin.user_management')</a></th>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <table width="100%">
            <thead>
              <th>@lang('admin.name')</th>
              <th>@lang('admin.role')</th>
              <th>E-Mail</th>
              <th>@lang('admin.access')</th>
              <th></th>
            </thead>
            <tbody>
            @foreach($users as $user)
              {{-- @if($user->role == 'Admin') @continue @endif --}}
              {{-- @if($user->role == 'User') @continue @endif --}}
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <form id="admin_access" action="{{ route('admin.access') }}" method="POST"> @csrf
                    <table width="100%">
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <td>@lang('admin.user'): <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                      <td>@lang('admin.moderator'): <input type="checkbox" {{ $user->hasRole('Moderator') ? 'checked' : '' }} name="role_moderator"></td>
                      <td>@lang('admin.admin'): <input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                      <td><button type="submit">@lang('admin.assign_roles')</button></td>
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
