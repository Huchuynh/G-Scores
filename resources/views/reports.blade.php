@extends('layouts.admin')

@section('title', 'Reports')

@section('content')
<div class="content">
    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
        <div>
            <h1 class="h3 mb-1">
                Reports
            </h1>
            <p class="fw-medium mb-0 text-muted">
                View and manage student reports.
            </p>
        </div>
    </div>
</div>

<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Statistics of the number of students with scores by subjects</h3>
            <div class="block-options">
                <form method="GET" action="{{ route('reports') }}">
                    <select class="form-select" name="subject" onchange="this.form.submit()">
                        @foreach($subjects as $key => $subject)
                        <option value="{{ $key }}" {{ $selectedSubject == $key ? 'selected' : '' }}>
                            {{ ucfirst($subject) }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <div class="block-content block-content-full text-center">
            <div class="py-3">
                <!-- Lines Chart Container -->
                <canvas id="scoreChart" width="628" height="425"></canvas>
            </div>
        </div>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default text-center">
            <h3 class="block-title">Top 10 Students of Group A (Math, Physics, Chemistry)</h3>
        </div>
        <div class="block-content">
            @isset($students)
            <table class="table table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Registration Number</th>
                        <th class="text-center">Math</th>
                        <th class="text-center">Physics</th>
                        <th class="text-center">Chemistry</th>
                        <th class="text-center">Total Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $index => $student)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $student->sbd }}</td>
                        <td class="text-center">{{ $student->toan }}</td>
                        <td class="text-center">{{ $student->vat_li }}</td>
                        <td class="text-center">{{ $student->hoa_hoc }}</td>
                        <td class="text-center">{{ $student->total_score }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-primary text-center" role="alert">
                <p class="mb-0">No data available</p>
            </div>
            @endisset
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json(array_keys($stats));
    const data = @json(array_values($stats));

    const ctx = document.getElementById('scoreChart').getContext('2d');
    const scoreChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Students',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50000
                    } // tùy chỉnh theo số lượng lớn
                }
            }
        }
    });
</script>
@endsection