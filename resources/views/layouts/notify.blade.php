
@if ($message = Session::get('notify'))
<div class="session alert alert-primary" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('secondary'))
<div class="session alert alert-secondary" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('success'))
<div class="session alert alert-success" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <h5>{{ $message }}</h5>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="session alert alert-danger" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <h5>{{ $message }}</h5>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="session alert alert-warning" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <h5>{{ $message }}</h5>
</div>
@endif

@if ($message = Session::get('info'))
<div class="session alert alert-info" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <h5>{{ $message }}</h5>
</div>
@endif

@if ($message = Session::get('light'))
<div class="session alert alert-light" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <h5>{{ $message }}</h5>
</div>
@endif

@if ($message = Session::get('dark'))
<div class="session alert alert-dark" role="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <h5>{{ $message }}</h5>
</div>
@endif</div>
