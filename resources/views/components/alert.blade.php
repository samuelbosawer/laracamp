@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    <strong> {{ $message }}</strong>
</div>

@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    <strong> {{ $message }}</strong>
</div>

@endif