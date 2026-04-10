<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

use App\Models\Company;

Route::get('/', function () {
    $companies = Company::latest()->get();
    return view('home', compact('companies'));
});

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);