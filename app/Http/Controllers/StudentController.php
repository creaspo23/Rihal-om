<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Country;
use App\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();



        return inertia()->render('Dashboard/students/index', [
            'students' => $students,

        ]);
    }

    public function create()
    {
        $classes = Classes::all();
        $countries = Country::all();

        return inertia()->render('Dashboard/students/create', [
            'classes' => $classes,
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'country_id' => 'required|exists:countries,id',
            'classe_id' => 'required|exists:classes,id'
        ]);



        Student::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Student created successfully'
        ]);

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $classes = Classes::all();
        $countries = Country::all();

        return inertia()->render('Dashboard/students/edit', [
            'student' => $student,
            'classes' => $classes,
            'countries' => $countries,
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'country_id' => 'required|exists:countries,id',
            'classe_id' => 'required|exists:classes,id'

        ]);

        $student->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Student updated successfully'
        ]);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Student deleted successfully'
        ]);

        return redirect()->back();
    }
}
