<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'image|nullable|max:1999',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies',
            'mobile' => 'required|string|max:15',
            'services' => 'required|array',
            'branches' => 'required|array',
        ]);

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
    public function show(string $id)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('companies.edit', compact('id'));
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

        $company->fill($request->all());

        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->store('logos', 'public');
            $company->logo = $filename;
        }

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
