@extends('layouts.app')

@section('content')
    <table border="0" width="100%">
      <tr>
        <th style="text-align: center;"><a href="{{ route('home') }}" class="btn btn-primary">Home</a></th>
      </tr>
    </table>

    {{-- @foreach($CheckList as $item)
    @if(Auth::user()->id == $item->user_id)
      @if($item->title != $card)
        @if($card != 1) </div></div> @endif
        <div class="card">
          <div class="card-header" style="background: #9999ff">
              <table border="0" width="100%">
                <tr>
                  <th>
                    <label class="control-label">Plan: {{ $item->title }}</label>
                  </th>
                  <th style="float:right">
                    <div class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li>
                          <form action="{{ route('item.edit', ['list_id'=>$item->list_id, 'title'=>$item->title, 'id'=>$item->id]) }}" method="GET">
                              {{ csrf_field() }}
                              <button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-pencil"></i> Edit</button>
                          </form>
                        </li>
                        <li>
                          <form action="{{ route('item.destroy.list', ['list_id'=>$item->list_id]) }}" method="POST">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <li><button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-trash"></i> Remove</a></button></li>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </th>
                </tr>
              </table>
          </div>
        </div>
@endsection
