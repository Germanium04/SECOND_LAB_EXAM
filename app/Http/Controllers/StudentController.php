<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student-list', compact('students'));
    }

    public function create()
    {
        return view('create_student');
    }

    public function store(Request $request)
    {
        Student::create($request->all());

        return redirect()->route('student.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit_student', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('student.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index');
    }
}