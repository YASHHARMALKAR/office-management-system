<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index() {
    $employees = Employee::with('company','manager')->get();
    return view('employees.index', compact('employees'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    $companies = Company::all();
    $employees = Employee::all();
    return view('employees.create', compact('companies','employees'));
}

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'company_id' => 'required'
    ]);

    Employee::create($request->all());

    return redirect('/employees');
}

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Employee $employee)
{
    $companies = Company::all();
    $employees = Employee::where('id','!=',$employee->id)->get();

    return view('employees.edit', compact('employee','companies','employees'));
}
/**
     * Update the specified resource in storage.
     */
public function update(Request $request, Employee $employee)
{
    $employee->update($request->all());
    return redirect('/employees');
}

    
    /**
     * Remove the specified resource from storage.
     */
  public function destroy(Employee $employee)
{
    $employee->delete();
    return redirect('/employees');
}
}
