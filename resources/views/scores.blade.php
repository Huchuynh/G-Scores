@extends('layouts.admin')

@section('title', 'Scores')

@section('content')
<div class="content">
    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
        <div>
            <h1 class="h3 mb-1">
                Search Scores
            </h1>
            <p class="fw-medium mb-0 text-muted">
                Search for student scores by registration number.
            </p>
        </div>
    </div>
</div>

<div class="content">
    <form action="{{ route('search.submit') }}" method="POST">
        @csrf
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">User Registration</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center py-sm-3 py-md-5">
                    <div class="col-sm-10 col-md-8">
                        <div class="mb-4">
                            <label class="form-label" for="block-form7-username">Registration Number</label>
                            <input type="text" class="form-control form-control-alt @error('sbd') is-invalid @enderror" id="sbd" name="sbd" placeholder="Enter registration number" value="{{ old('sbd') }}" required>
                            @if($errors->has('sbd'))
                            <div class="invalid-feedback">{{ $errors->first('sbd') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light text-end">
                <button type="submit" class="btn btn-alt-primary">
                    <i class="fa fa-check opacity-50 me-1"></i> Submit
                </button>
            </div>
        </div>
    </form>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Detailed Scores</h3>
        </div>
        <div class="block-content">
            @isset($student)
            <div class="mb-4">
                <div class="mb-2">
                    <span class="fw-semibold">Registration Number:</span>
                    <span class="text-muted">{{ $student->sbd }}</span>
                </div>
                <div class="mb-2">
                    <span class="fw-semibold">Foreign Language Code:</span>
                    <span class="text-muted">{{ $student->ma_ngoai_ngu }}</span>
                </div>
            </div>

            <table class="table table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">Math</th>
                        <th class="text-center">Literature</th>
                        <th class="text-center">Foreign Language</th>
                        <th class="text-center">Physics</th>
                        <th class="text-center">Chemistry</th>
                        <th class="text-center">Biology</th>
                        <th class="text-center">History</th>
                        <th class="text-center">Geography</th>
                        <th class="text-center">Civic Education</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $student->toan }}</td>
                        <td class="text-center">{{ $student->ngu_van }}</td>
                        <td class="text-center">{{ $student->ngoai_ngu }}</td>
                        <td class="text-center">{{ $student->vat_li }}</td>
                        <td class="text-center">{{ $student->hoa_hoc }}</td>
                        <td class="text-center">{{ $student->sinh_hoc }}</td>
                        <td class="text-center">{{ $student->lich_su }}</td>
                        <td class="text-center">{{ $student->dia_li }}</td>
                        <td class="text-center">{{ $student->gdcd }}</td>
                    </tr>
                </tbody>
            </table>
            @else
            <div class="alert alert-primary text-center" role="alert">
                <p class="mb-0">Please enter your registration number to view scores.</p>
            </div>
            @endisset
        </div>
    </div>
</div>
@endsection