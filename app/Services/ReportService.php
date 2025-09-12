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

    public function generateReport(): array
    {
        $stats = [];

        foreach ($this->subjects as $field => $label) {
            $stats[$label] = [
                '>=8'   => DB::table('students')->where($field, '>=', 8)->count(),
                '6-7.75' => DB::table('students')->where($field, '>=', 6)->where($field, '<', 8)->count(),
                '4-5.75' => DB::table('students')->where($field, '>=', 4)->where($field, '<', 6)->count(),
                '<4'    => DB::table('students')->where($field, '<', 4)->count(),
            ];
        }

        return $stats;
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
