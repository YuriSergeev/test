@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <table border="0" width="100%">
            <tr>
              <th style="float: left;"><a href="{{ route('admin.admins_table') }}" class="btn btn-primary">@lang('admin.admin_table')</a></th>
              <th style="float: right;"><a href="{{ route('admin.users_table') }}" class="btn btn-primary">@lang('admin.user_management')</a></th>
            </tr>
          </table>
        </div>
      </div>

      @foreach ($users as $user)
        @if($user->role == 'Admin') @continue @endif
        <div class="card">
            <div class="card-header">
              <table border="0" width="100%">
                  <th>@lang('admin.name'): {{ $user->name }} - @lang('admin.role'): {{ $user->role }}</th>
                  <th style="float: right;">
                    <form id="condition" action="{{ route('user.access', ['id'=>$user->id]) }}" method="POST">
                      <div class="toggle lg">
                          <button type="submit" style="all: unset;"><input type="checkbox" @if(!$user->access) checked @endif><span class="button-indecator"></span></button>
                      </div>
                      @csrf
                    </form>
                  </th>
                  <th style="float: right; margin-top: 4px;">
                    <label>@lang('admin.access'): </label>
                  </th>
              </table>
            </div>
          @foreach($user->checklists as $checklist)
            {{-- @if($admin->job_title == 'Admin') @continue @endif --}}
            <div class="card-header">
              <table border="0" width="100%">
                  <th>@lang('app.plan'): {{ $checklist->title }}</th>
              </table>
            </div>
            <div class="card-body">
              @foreach ($checklist->items as $item)
                <table border="0" width="100%">
                    <th>{{ $item->task }}</th>
                </table>
              @endforeach
            </div>
          @endforeach
        </div>
      @endforeach

    </div>
  </div>
</div>
@endsection
