@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('home.create') }}" method="POST" class="row">
                        <div class="form-group col-md-10">
                          <label class="control-label">@lang('app.title'):</label>
                          <input type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                        </div>
                        <div class="form-group col-md-2">
                          <label class="control-label">@lang('app.size'):</label>
                          <input type="number" class="form-control" name="size" value="{{ old('size') }}" required>
                        </div>
                        <div class="form-group col-md-10">
                          @lang('app.possible_create_list'): {{ Auth::user()->possibleCreateList }}
                        </div>
                        <div class="form-group col-md-2">
                          @if(Auth::user()->possibleCreateList != 0)<th style="float: right;"><button type="submit" class="btn btn-primary" style="float: right;">@lang('app.create_list')</button></th>@endif
                        </div>
                        @csrf
                    </form>
                </div>
            </div>

            @foreach (Auth::user()->checklists as $checklist)
              <div class="card">
                <div class="card-header">
                  <table border="0" width="100%">
                      <th>
                        <label class="control-label">@lang('app.plan'): {{ $checklist->title }}</label>
                      </th>
                      <th style="float:right">
                        <div class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                          <ul class="dropdown-menu settings-menu dropdown-menu-right">
                            <li>
                              <form action="{{ route('home.edit', ['id'=>$checklist->id]) }}" method="GET">
                                  @csrf
                                  <button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-pencil"></i> @lang('app.edit')</button>
                              </form>
                            </li>
                            <li>
                              <form id="delete_list" action="{{ route('home.destroy.list', ['id'=>$checklist->id]) }}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <li><button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-trash"></i> @lang('app.remove')</a></button></li>
                              </form>
                            </li>
                          </ul>
                        </div>
                      </th>
                  </table>
                </div>
                <div class="card-body">
              @foreach ($checklist->items as $item)
                <table border="0" width="100%">
                  <tr>
                    <th>{{ $item->task }}</th>
                    <th style="float:right">
                      <form id="delete" action="{{ route('home.destroy', ['id' => $item->id]) }}" method="POST"> @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; outline: none; background: none;"><i class="fa fa-trash"></i></button>
                      </form>
                    </th>
                    <th style="float: right;">
                      <form id="condition" action="{{ route('home.condition', $item->id) }}" method="POST">
                        <div class="toggle lg">
                          <label>
                            <button type="submit" style="all: unset;"><input type="checkbox" @if(!$item->condition == false) checked @endif><span class="button-indecator"></span></button>
                          </label>
                        </div>
                        @csrf
                      </form>
                    </th>
                  </tr>
                </table>
              @endforeach
                </div>
              </div>
            @endforeach

            </div>
          </div>
        </div>
    </div>
</div>
@endsection
