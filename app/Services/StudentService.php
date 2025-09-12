<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function findBySbd(string $sbd): ?Student
    {
        $sbd = trim($sbd);
        // nếu SBD có thể chứa leading zeros, giữ nguyên
        return Student::where('sbd', $sbd)->first();
    }
}
