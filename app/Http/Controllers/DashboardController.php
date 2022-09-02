<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Country;
use App\Student;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()

    {
        $avarge = 0;

        $classes = Classes::with('student')->get();
        $countires = Country::with(['student'])->get();

        $students_number = Student::count();
        $country_number = Country::count();
        $classes_number = Classes::count();

        foreach (Student::all() as $student) {
            $avarge += Carbon::parse($student['date_of_birth'])->age;
        }

        $avarge = ($avarge / $students_number);
     
        return inertia()->render('Dashboard/Index', [
            'students_number' => $students_number,
            'country_number' => $country_number,
            'classe_number' => $classes_number,
            'classes' => $classes,
            'countires' => $countires,
            'avarge'=>$avarge,
        ]);
    }

    public function ui()
    {
        return inertia()->render('Dashboard/UI');
    }
}
