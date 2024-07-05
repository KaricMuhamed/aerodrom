<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffMembers = Staff::all(); // Fetch all staff members from the database

        return view('staff.index', compact('staffMembers'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'required'
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff member created successfully.');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:staff,email,'.$id,
            'phone' => 'required'
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
