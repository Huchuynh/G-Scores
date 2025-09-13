<?php

namespace App\Http\Controllers;


use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected ReportService $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function reports(Request $request)
    {
        $subjects = [
            'toan' => 'Math',
            'ngu_van' => 'Literature',
            'ngoai_ngu' => 'Foreign Language',
            'vat_li' => 'Physics',
            'hoa_hoc' => 'Chemistry',
            'sinh_hoc' => 'Biology',
            'lich_su' => 'History',
            'dia_li' => 'Geography',
            'gdcd' => 'Civic Education',
        ];
        $selectedSubject = $request->get('subject', 'toan');

        $stats =  $this->reportService->generateReport($selectedSubject);
        $students = $this->reportService->topGroupA(10);
        return view('reports', compact('stats', 'students', 'subjects', 'selectedSubject'));
    }
}
