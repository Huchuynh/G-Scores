<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function showView()
    {
        return view('scores');
    }


    public function search(SearchStudentRequest $request)
    {
        $sbd = $request->input('sbd');
        $student = $this->studentService->findBySbd($sbd);

        if (!$student) {
            return redirect()->back()
                ->withErrors(['sbd' => 'Student with registration number ' . $sbd . ' not found.'])
                ->withInput();
        }

        return view('scores', compact('student', 'sbd'));
    }
}
