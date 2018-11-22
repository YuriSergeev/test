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
            <tr>
              <th>Name</th>
              <th>Job title</th>
            </tr>

            @foreach($admins as $admin)
              @if($admin->job_title == 'Admin') @continue @endif
              <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->job_title }}</td>
              </tr>
            @endforeach

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
