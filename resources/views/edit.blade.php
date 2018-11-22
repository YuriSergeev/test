@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('item.update', ['id' => $checklist->id]) }}" method="POST">
            <div class="card">
                <div class="card-header">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $checklist->title }}" required autofocus>
                </div>
            </div>
            @foreach ($checklist->items as $item)
              <div class="card">
                <div class="card-body">
                  <table border="0" width="100%">
                      <th>
                        <input type="text" class="form-control" name="title" value="{{ $item->task }}" required>
                      </th>
                  </table>
                </div>
              </div>
            @endforeach
            <div class="card">
                <div class="card-header">
                  @method('PUT')
                  @csrf
                  <button type="submit" class="btn btn-primary" style="float: right;">Edit list</button>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
