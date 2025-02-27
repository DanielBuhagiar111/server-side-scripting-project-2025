<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{   
    // Create

    // Create a new college
    public function create() {
        $college = new College();
        return view('colleges.create', compact('college'));
    }

    // Store the form data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required'
        ]);
        
        College::create($request->all());
        return redirect()->route('colleges.index')->with('message', 'College has been saved successfully');
    }

    // Read

    // Display all collages
    public function index() {
        $colleges = College::orderBy('name')->get();
        return view('colleges.index', compact('colleges'));
    }
    
    // Display college details
    public function show($college_id) {
        $college = College::find($college_id);
        return view('colleges.show', compact('college'));
    }

    // Update

    // Display the edit form
    public function edit($college_id){
        $college = College::find($college_id);
        return view('colleges.edit', compact('college')); 
    }

    // Update the user details from the edit form
    public function update($college_id, Request $request){
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $college_id,  // exclude current college from unique check
            'address' => 'required'
        ]);        

        $college = College::find($college_id);
        $college->update($request->all());

        return redirect()->route('colleges.index')->with('message', 'College has been updated successfully');
    }

    // Delete
    
    // Destroy the college with the id $id
    public function destroy($college_id){
        $college = College::find($college_id);
        $college->delete();
        return back()->with('message', 'College has been deleted successfully');
    }
}