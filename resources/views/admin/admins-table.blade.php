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
                      @if(Auth::user()->job_title == 'Admin')<th style="text-align: center;"><a href="{{ route('admin.admins_table') }}" class="btn btn-primary">Admin table</a></th>@endif
                      <th style="float: right;"><a href="{{ route('admin.users_table') }}" class="btn btn-primary">User management</a></th>
                  </table>
                </div>
            </div>
            <div class="card">
              <div class="card-body">
                <table width="100%">
                  <tr>
                    <th>Name</th>
                    <th>Job title</th>
                  </tr>
              @foreach($admins as $admin)
                @if($admin->job_title == 'Admin') @continue @endif
                <form action="{{ route('edit.data.user') }}" method="POST" class="row">
                  {{ csrf_field() }}
                    <tr>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->job_title }}</td>
                    </tr>
                </form>
              @endforeach
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
