<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(Session::has('checklist_create'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>@lang('home.success'):</strong> @lang('home.checklist_create')
        </div>
      @elseif (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Error:</strong>
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
      @elseif (Session::has('checklist_edited'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>@lang('home.success'):</strong> @lang('home.checklist_edited')
        </div>
      @endif
    </div>
  </div>
</div>
