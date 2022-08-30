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
        $classes = Classes::all();
        $countries = Country::all();

        return inertia()->render('Dashboard/students/index', [
            'students' => $students,
            'classes' => $classes,
            'countries' => $countries,
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/students/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'date_of_birith' => 'required',
            'class_id' => 'required',
            'country_id' => 'required',
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
        return inertia()->render('Dashboard/students/edit', ['student' => $student]);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'class_id' => 'required',
            'country_id' => 'required'

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
