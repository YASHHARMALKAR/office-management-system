<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class CompanyController extends Controller
{
    // 🔹 List companies
    public function index() {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    // 🔹 Show create form
    public function create() {
        return view('companies.create');
    }

    // 🔹 Store company
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'location' => 'required'
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index');
    }

    // 🔥 NEW: Show employees of company
    public function show(Company $company) {
        $employees = Employee::where('company_id', $company->id)->get();

        return view('companies.show', compact('company', 'employees'));
    }

    // 🔹 Edit form
    public function edit(Company $company) {
        return view('companies.edit', compact('company'));
    }

    // 🔹 Update company
    public function update(Request $request, Company $company) {
        $request->validate([
            'name' => 'required',
            'location' => 'required'
        ]);

        $company->update($request->all());

        return redirect('/companies');
    }

    // 🔹 Delete company
    public function destroy(Company $company) {
        $company->delete();
        return redirect('/companies');
    }
}