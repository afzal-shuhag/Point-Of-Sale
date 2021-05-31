<!-- @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif -->

@if(Session::has('success_message_top'))
    <div class="alert alert-success col-md-6 m-auto">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{ Session::get('success_message_top') }}</p>
    </div>
@endif

@if(Session::has('error_message_top'))
    <div class="alert alert-danger col-md-6 m-auto">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{ Session::get('error_message_top') }}</p>
    </div>
@endif
