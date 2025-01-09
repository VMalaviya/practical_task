<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('companies.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
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

        // dd($request);

        $company = new Company($request->all());

        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->store('logos', 'public');
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'logo' => 'image|nullable|max:1999',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'mobile' => 'required|string|max:15',
            'services' => 'required|array',
            'branches' => 'required|array',
        ]);

        // dd($request);

        $company->fill($request->all());

        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->store('logos', 'public');
            $company->logo = $filename;
        }

        // dd($company);

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
