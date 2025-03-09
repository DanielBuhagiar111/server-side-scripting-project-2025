<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;


class CollegeController extends Controller
{   
    // Create

    // Create a new college
    public function create() {
        try{
            $college = new College();
            return view('colleges.create', compact('college'));
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Could not open the create page! An error occurred.');
        }
    }

    // Store the form data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required'
        ]);

        try{ 
            College::create($request->all());
            return redirect()->route('colleges.index')->with('message', 'College has been saved successfully');
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'College was not saved successfully! An error occurred.');
        }
    }

    // Read

    public function index()
    {
        try{
            $colleges = College::all(); 
            return view('colleges.index', compact('colleges'));
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Could not show Colleges! An error occurred.');
        }
    }
    
    // Display college details
    public function show($college_id) {
        try {
            $college = College::find($college_id);
            return view('colleges.show', compact('college'));
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Could not view College! An error occurred.');
        }
    }

    // Update

    // Display the edit form
    public function edit($college_id){
        try {
            $college = College::find($college_id);
            return view('colleges.edit', compact('college')); 
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'Could not edit College! An error occurred.');
        }
    }

    // Update the user details from the edit form
    public function update($college_id, Request $request){
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $college_id,  // exclude current college from unique check
            'address' => 'required'
        ]);        

        try {
            $college = College::find($college_id);
            $college->update($request->all());

            return redirect()->route('colleges.index')->with('message', 'College has been updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('colleges.index')->with('error', 'College was not updated successfully! An error occurred.');
        }
    }

    // Delete
    
    // Destroy the college with the id $id
    public function destroy($college_id){
        try {
            $college = College::find($college_id);
            $college->delete();
            return back()->with('message', 'College has been deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'College was not deleted successfully! An error occurred.');
        }
    }
}