@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('item.create') }}" method="POST" class="row">
                        <div class="form-group col-md-10">
                          <label class="control-label">Title</label>
                          <input type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                        </div>
                        <div class="form-group col-md-2">
                          <label class="control-label">Size</label>
                          <input type="number" class="form-control" name="size" value="{{ old('size') }}" required>
                        </div>
                        <div class="form-group col-md-10">
                          It is possible to create items: {{ Auth::user()->possibleCreateList }}
                        </div>
                        <div class="form-group col-md-2">
                          @if(Auth::user()->possibleCreateList != 0)<th style="float: right;"><button type="submit" class="btn btn-primary" style="float: right;">Create list</button></th>@endif
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

            @foreach (Auth::user()->checklists as $checklist)
              <div class="card">
                  <div class="card-header">
                    <table border="0" width="100%">
                        <th>
                          <label class="control-label">Plan: {{ $checklist->title }}</label>
                        </th>
                        <th style="float:right">
                          <div class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                              <li>
                                <form action="{{ route('item.edit', ['id'=>$checklist->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-pencil"></i> Edit</button>
                                </form>
                              </li>
                              <li>
                                <form action="{{ route('item.destroy.list', ['id'=>$checklist->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <li><button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-trash"></i> Remove</a></button></li>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </th>
                    </table>
                </div>
              </div>
              <div class="card">
                  <div class="card-body">
              @foreach ($checklist->items as $item)
                      <table border="0" width="100%">
                      <tr>
                        <th>{{ $item->task }}</th>
                        <th style="float: right;">
                          <form action="{{ route('item.condition', $item->id) }}" method="POST">
                              <div class="toggle lg">
                                <label>
                                  <button type="submit" style="border:none; background: none;"><input type="checkbox" @if(!$item->condition == false) checked @endif><span class="button-indecator"></span></button>
                                </label>
                              </div>
                              {{ csrf_field() }}
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
