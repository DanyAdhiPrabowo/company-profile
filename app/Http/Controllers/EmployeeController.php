<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller{

  public function index(){
    $employees = \App\User::where('role', 'employee')->orderBy('id', 'desc')->paginate(10);
    return view('employees.index', ['employees'=>$employees]);
  }

  public function create(){
    return view('employees.create');
  }

  public function store(Request $request){
    \Validator::make($request->all(), [
      'name' => 'required|min:2|max:20',
      'email' => 'required|email|unique:users',
    ])->validate();

    $new_employee = new \App\User;
    $new_employee->name = $request->get('name');
    $new_employee->email = $request->get('email');
    $new_employee->role = 'employee';
    $new_employee->password = bcrypt('password');
    $new_employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
  }

  public function edit($id){
    $employee = \App\User::find($id);
    if (!$employee) {
      return redirect()->route('employees.index')->with('error', 'Employee not found.');
    }

    return view('employees.edit', ['employee' => $employee]);
  }

  public function update(Request $request, $id){
    \Validator::make($request->all(), [
      'name' => 'required|min:2|max:20',
      'email' => 'required|email|unique:users,email,'.$id,
    ])->validate();

    $employee = \App\User::find($id);
    if (!$employee) {
      return redirect()->route('employees.index')->with('error', 'Employee not found.');
    }

    $employee->name = $request->get('name');
    $employee->email = $request->get('email');
    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
  }

  public function destroy($id){
    \App\User::where('id', $id)->delete();
    return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
  }
  public function show($id){
    return view('employee.show', compact('id'));
  }
}
