<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Country;
use App\Student;


class DashboardController extends Controller
{
    public function index()

    {
        $classes = Classes::with('student')->get();
        $countires = Country::with(['student'])->get();
        // dd($classes);


        $students_number = Student::count();
        $country_number = Country::count();
        $classes_number = Classes::count();


        return inertia()->render('Dashboard/Index', [
            'students_number' => $students_number,
            'country_number' => $country_number,
            'classe_number' => $classes_number,
            'classes' => $classes,
            'countires'=>$countires,
        ]);
    }

    public function ui()
    {
        return inertia()->render('Dashboard/UI');
    }
}
