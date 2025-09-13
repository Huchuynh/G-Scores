<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Cache;

class StudentService
{
    public function findBySbd(string $sbd): ?Student
    {
        $sbd = trim($sbd);

        return Cache::remember("student_{$sbd}", 3600, function () use ($sbd) {
            return Student::select('sbd', 'toan', 'ngu_van', 'ngoai_ngu', 'vat_li', 'hoa_hoc', 'sinh_hoc', 'lich_su', 'dia_li', 'gdcd', 'ma_ngoai_ngu')
                ->where('sbd', $sbd)
                ->first();
        });
    }
}
