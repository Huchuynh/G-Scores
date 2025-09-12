@extends('layouts.admin')

@section('title', 'Reports')

@section('content')

<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Reports</h1>
        </div>
    </div>
</div>

<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default text-center">
            <h3 class="block-title">Statistics of the number of students with scores by subjects</h3>
        </div>
        <div class="block-content block-content-full text-center">
            <div class="py-3">
                <!-- Lines Chart Container -->
                <canvas id="reportChart" style="height: 340px; display: block; box-sizing: border-box; width: 502px;" width="628" height="425"></canvas>
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
    const data = {
        labels: @json(array_keys($stats)),
        datasets: [{
                label: ">= 8",
                data: @json(array_column($stats, '>=8')),
                backgroundColor: "rgba(75, 192, 192, 0.7)"
            },
            {
                label: "6 - 7.75",
                data: @json(array_column($stats, '6-7.75')),
                backgroundColor: "rgba(54, 162, 235, 0.7)"
            },
            {
                label: "4 - 5.75",
                data: @json(array_column($stats, '4-5.75')),
                backgroundColor: "rgba(255, 206, 86, 0.7)"
            },
            {
                label: "< 4",
                data: @json(array_column($stats, '<4')),
                backgroundColor: "rgba(255, 99, 132, 0.7)"
            },
        ]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    beginAtZero: true
                }
            }
        }
    };

    new Chart(document.getElementById('reportChart'), config);
</script>

@endsection