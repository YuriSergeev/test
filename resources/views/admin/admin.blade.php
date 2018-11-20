@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <table border="0" width="100%">
                    <tr>
                      <th style="float: left;"><a href="{{ route('admin.admin') }}" class="btn btn-primary">All checklists</a></th>
                      @if(Auth::user()->job_title == 'Admin')<th style="text-align: center;"><a href="{{ route('admin.admins_table') }}" class="btn btn-primary">Admin table</a></th>@endif
                      <th style="float: right;"><a href="{{ route('admin.users_table') }}" class="btn btn-primary">User management</a></th>
                    </tr>
                  </table>
                </div>
            </div>
            <?php $card = 1; ?>
            @foreach($CheckList as $item)
              @if($item->title != $card)
                @if($card != 1) </div></div> @endif
                <div class="card">
                  <div class="card-header" style="background: #9999ff">
                      <table border="0" width="100%">
                        <tr>
                          <th>
                            <label class="control-label">Plan: {{ $item->title }}</label>
                          </th>
                          <th>

                          </th>
                        </tr>
                      </table>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <?php $card = $item->title ?>
              @endif
                <table border="0" width="100%">
                <tr>
                  <th>{{ $item->description }}</th>
                </tr>
                </table>
            @endforeach
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
