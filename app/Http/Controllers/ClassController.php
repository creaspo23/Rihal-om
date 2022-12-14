<?php

namespace App\Http\Controllers;


use App\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::latest()->simplePaginate(50);

        return inertia()->render('Dashboard/classes/index', [
            'classes' => $classes
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate(['name' => 'required']);

        Classes::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'class has been added  successfully'
        ]);
        return redirect()->back();
    }

    public function update(Request $request, Classes $classe)
    {
        $data = $request->validate(['name' => 'required']);

        $classe->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'class updated successfully'
        ]);

        return redirect()->back();
    }

    public function destroy(Classes $classe)
    {
        $classe->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'Class  has been deleted successfully'
        ]);

        return redirect()->back();
    }
}
