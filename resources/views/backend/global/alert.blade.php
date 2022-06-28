
@if (session('success'))
<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
    <i class="far fa-check-circle flex-shrink-0 me-2"></i>
    <p class="m-0">{{ session('success') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle flex-shrink-0 me-2"></i>
    <p class="m-0">{{ session('error') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle flex-shrink-0 me-2"></i>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif