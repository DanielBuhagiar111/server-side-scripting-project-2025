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
            // Try to create a new college object and go to the create page
            $college = new College();
            return view('colleges.create', compact('college'));
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('colleges.index')->with('error', 'Could not open the create page! An error occurred.');
        }
    }

    // Store the form data
    public function store(Request $request)
    {
        // Validate the form input fields outside of the try to avoid triggering the exception
        $request->validate([
            'name' => 'required|unique:colleges,name', // Name is required and has to be unique
            'address' => 'required' // Address is required
        ]);

        try{ 
            // Try to save the college and go to the index page with a success message
            College::create($request->all());
            return redirect()->route('colleges.index')->with('message', 'College has been saved successfully');
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('colleges.index')->with('error', 'College was not saved successfully! An error occurred.');
        }
    }

    // Read

    // Display all the Colleges
    public function index()
    {
        try{
            // Try to get all the colleges and return go to the index page with the returned colleges
            $colleges = College::all(); 
            return view('colleges.index', compact('colleges'));
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('colleges.index')->with('error', 'Could not show Colleges! An error occurred.');
        }
    }
    
    // Display college details
    public function show($college_id) {
        try {
            // Try to find the college and go to the show page with the returned college
            $college = College::find($college_id);
            return view('colleges.show', compact('college'));
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('colleges.index')->with('error', 'Could not view College! An error occurred.');
        }
    }

    // Update

    // Display the edit form
    public function edit($college_id){
        try {
            // Try to find the college and go to the edit page with the returned college
            $college = College::find($college_id);
            return view('colleges.edit', compact('college')); 
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('colleges.index')->with('error', 'Could not edit College! An error occurred.');
        }
    }

    // Update the college details from the edit form
    public function update($college_id, Request $request){
        // Validate the form input fields outside of the try to avoid triggering the exception
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $college_id,  // Name is required and has to be unique and exclude current college from unique check
            'address' => 'required' // Address is required
        ]);        

        try {
            // Try to find the college being edited, save the changes and go to the index page with a success message
            $college = College::find($college_id);
            $college->update($request->all());
            return redirect()->route('colleges.index')->with('message', 'College has been updated successfully');
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('colleges.index')->with('error', 'College was not updated successfully! An error occurred.');
        }
    }

    // Delete
    
    // Destroy the college with the id $college_id
    public function destroy($college_id){
        try {
            // Try to find the college being deleted, delete the college and the go back to the same page which is the index page with a success message
            $college = College::find($college_id);
            $college->delete();
            return back()->with('message', 'College has been deleted successfully');
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return back()->with('error', 'College was not deleted successfully! An error occurred.');
        }
    }
}