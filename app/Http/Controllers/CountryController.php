<?php

namespace App\Http\Controllers;


use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->simplePaginate(50);
      
        return inertia()->render('Dashboard/countries/index', [
            'countries' => $countries
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);
      
        Country::create($data);
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'country has been added successfully'
        ]);
        return redirect()->back();
    }

    public function update(Request $request, Country $country)
    {
        $data = $request->validate(['name' => 'required']);
        
        $country->update($data);
        
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Country  has been updated successfully'
        ]);

        return redirect()->back();
    }

    public function destroy(Country $country)
    {
        $country->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'country has been  deleted successfully'
        ]);

        return redirect()->back();
    }
}
