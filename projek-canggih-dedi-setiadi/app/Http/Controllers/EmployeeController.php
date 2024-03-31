<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // QUERY BUILDER
        $pageTitle = 'Employee List';
        $employees = DB::table('employees')
            ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
            ->select('employees.*', 'positions.name as position_name', 'employees.id as employee_id')
            ->get();

        return view('employee.index', [
            'pageTitle' => $pageTitle,
            'employees' => $employees
        ]);
    }

    public function create()
    {
        // QUERY BUILDER
        $pageTitle = 'Create Employee';
        $positions = DB::table('positions')->get();
        return view('employee.create', compact('pageTitle', 'positions'));
    }

    public function store(Request $request)
    {
        // QUERY BUILDER
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return $request->all();
    }

    public function show(string $id)
    {
        // QUERY BUILDER
        $pageTitle = 'Employee Detail';
        $employee = DB::table('employees')
            ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
            ->select('employees.*', 'positions.name as position_name', 'employees.id as employee_id')
            ->where('employees.id', $id)
            ->first();

        return view('employee.show', compact('pageTitle', 'employee'));
    }

    public function edit(string $id)
    {
        // QUERY BUILDER
        $pageTitle = 'Employee Edit';
        $employee = DB::table('employees')
            ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
            ->select('employees.*', 'positions.name as position_name', 'employees.id as employee_id')
            ->where('employees.id', $id)
            ->first();

        return view('employee.edit', compact('pageTitle', 'employee'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // QUERY BUILDER
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // QUERY BUILDER
        DB::table('employees')
            ->where('id', $id)
            ->delete();
        return redirect()->route('employees.index');
    }
}
