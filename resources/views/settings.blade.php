@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="content">
    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
        <div>
            <h1 class="h3 mb-1">
                Settings
            </h1>
            <p class="fw-medium mb-0 text-muted">
                Manage your account settings and preferences.
            </p>
        </div>
    </div>
</div>

<div class="content">
    <div class="alert alert-info d-flex align-items-center" role="alert">
        <div class="flex-shrink-0">
            <i class="fa fa-fw fa-info-circle"></i>
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="mb-0">This feature is still under development.</p>
        </div>
    </div>
</div>
@endsection