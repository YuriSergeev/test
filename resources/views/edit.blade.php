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
                      <input type="text" class="form-control" name="title" value="{{ $item->task }}" required>
                  </div>
              </div>
            @endforeach
          </form>
        </div>
    </div>
</div>
@endsection
