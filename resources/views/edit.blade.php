@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('item.update', $id) }}" method="POST">
            <div class="card">
                <div class="card-header">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $title }}" required autofocus>
                </div>
            </div>
            <?php $i = 1 ?>
            @foreach ($CheckList as $item)
              @if($item->list_id == $list_id)
              <div class="card">
                <div class="card-body">
                  <table border="0" width="100%">
                    <tr>
                      <th>
                        <label class="control-label">{{ $i }} item</label>
                      </th>
                      <th>
                        <input type="text" class="form-control" name="{{ $i }}" value="{{ $item->description }}" required>
                      </th>
                      <th style="float:right;">
                        <form action="{{ route('item.destroy', ['id'=>$item->id]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-trash"></i></a></button>
                        </form>
                      </th>
                    </tr>
                  </table>
                </div>
              </div>
              <?php $i++ ?>
              @endif
            @endforeach
            <div class="card">
              <div class="card-header">
                <input type="hidden" name="size" value="{{ $i-- }}">
                <button type="submit" class="btn btn-primary" style="float: right; margin-top: 5px;">Edit List</button>
                {{ method_field('PUT') }}
                {{ csrf_field() }}
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
