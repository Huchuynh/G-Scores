<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ReportService
{
    protected array $subjects = [
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

    public function generateReport(string $selectedSubject): array
    {
        $result = DB::table('students')
            ->selectRaw("
            SUM(CASE WHEN $selectedSubject < 4 THEN 1 ELSE 0 END) as lt_4,
            SUM(CASE WHEN $selectedSubject BETWEEN 4 AND 5.75 THEN 1 ELSE 0 END) as between_4_5_75,
            SUM(CASE WHEN $selectedSubject BETWEEN 6 AND 7.75 THEN 1 ELSE 0 END) as between_6_7_75,
            SUM(CASE WHEN $selectedSubject >= 8 THEN 1 ELSE 0 END) as gte_8
        ")
            ->first();

        return [
            '<4' => $result->lt_4,
            '4 - 5.75' => $result->between_4_5_75,
            '6 - 7.75' => $result->between_6_7_75,
            '>=8' => $result->gte_8,
        ];
    }

    public function topGroupA(int $limit = 10)
    {
        return DB::table('students')
            ->select(
                'sbd',
                'toan',
                'vat_li',
                'hoa_hoc',
                DB::raw('(COALESCE(toan,0) + COALESCE(vat_li,0) + COALESCE(hoa_hoc,0)) as total_score')
            )
            ->orderByDesc('total_score')
            ->limit($limit)
            ->get();
    }
}
