@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('item.store') }}" method="POST">
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>
                        <table border="0" width="100%">
                          <th>It is possible to create items: {{ Auth::user()->possibleCreateItem }}</th>
                          @if(Auth::user()->possibleCreateItem != 0)<th style="float: right;"><button type="submit" class="btn btn-primary" style="float: right; margin-top: 5px;">Add item</button></th>@endif
                        </table>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            @foreach($CheckList as $item)
            @if(Auth::user()->id == $item->user_id)
              <div class="card">
                <div class="card-body">
                  <table border="0" width="100%">
                    <tr>
                      <th>{{ $item->description }}</th>

                      <th style="float: right;">
                        <div class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                          <ul class="dropdown-menu settings-menu dropdown-menu-right">
                            <li>
                              <form action="{{ route('item.edit', ['id'=>$item->id]) }}" method="GET">
                                  {{ csrf_field() }}
                                  <button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-pencil"></i> Edit</button>
                              </form>
                            </li>
                            <li>
                              <form action="{{ route('item.destroy', ['id'=>$item->id]) }}" method="POST">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}
                                  <li><button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-trash"></i> Remove</a></button></li>
                              </form>
                            </li>
                          </ul>
                        </div>
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
                </div>
              </div>
            @endif
            @endforeach

        </div>
    </div>
</div>
@endsection
