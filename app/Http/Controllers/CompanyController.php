<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * Retrieves all companies and returns the index view.
     */
    public function index()
    {
        $companies = Company::all();
        
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     * Retrieves all countries and returns the create view.
     */
    public function create()
    {
        $countries = Country::all();
        return view('companies.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     * Validates the request data and stores a new company in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:1999',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies',
            'mobile' => 'required|string|max:15',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'services' => 'required|array',
            'branches' => 'required|array',
        ]);

        $company = new Company($request->all());

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->store('logos', 'public');
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     * Returns the show view for a specific company.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     * Retrieves the company and related data for editing.
     */
    public function edit(Company $company)
    {
        $countries = Country::all();
        $states = State::where('country_id', $company->country_id)->get();
        $cities = City::where('state_id', $company->state_id)->get();
        return view('companies.edit', compact('company', 'countries', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     * Validates the request data and updates the company in the database.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'logo' => 'image|nullable|max:1999',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'mobile' => 'required|string|max:15',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'services' => 'required|array',
            'branches' => 'required|array',
        ]);

        $company->fill($request->all());

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->store('logos', 'public');
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * Deletes the specified company from the database.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
