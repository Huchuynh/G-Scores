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
        $groups = [
            '<4' => [0, 3.75],
            '4 - 5.75' => [4, 5.75],
            '6 - 7.75' => [6, 7.75],
            '>=8' => [8, 10],
        ];

        $counts = [];

        foreach ($groups as $label => $range) {
            $counts[$label] = DB::table('students')->whereBetween($selectedSubject, $range)->count();
        }

        return $counts;
    }

    public function topGroupA(int $limit = 10)
    {
        return DB::table('students')
            ->select('sbd', 'toan', 'vat_li', 'hoa_hoc', DB::raw('(toan + vat_li + hoa_hoc) as total_score'))
            ->orderByDesc('total_score')
            ->limit($limit)
            ->get();
    }
}
