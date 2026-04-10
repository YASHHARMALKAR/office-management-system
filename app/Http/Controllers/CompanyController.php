<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create() {
        return view('companies.create');
    }

    public function store(Request $request) {
        Company::create($request->all());
        return redirect()->route('companies.index');
    }

public function edit(Company $company) {
    return view('companies.edit', compact('company'));
}

public function update(Request $request, Company $company) {
    $company->update($request->all());
    return redirect('/companies');
}

public function destroy(Company $company) {
    $company->delete();
    return redirect('/companies');
}
}