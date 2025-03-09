<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    // Create

    // Create a new student
    public function create() {
        try{
            // Try to create a new student object, get all calleges and go to the create page
            $student = new Student();
            $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
            return view('students.create', compact('colleges', 'student'));
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('students.index')->with('error', 'Could not open the create page! An error occurred.');
        }
    }

    // Store the form data
    public function store(Request $request)
    {
        // Validate the form input fields outside of the try to avoid triggering the exception
        $request->validate([
            'name' => 'required', // Name is required
            'email' => 'required|email|unique:students,email', // Email is required, has to be in an email format and has to be unique
            'phone' => 'required|regex:/^\d{8}$/',  // Phone is required and needs to have exactly 8 digits
            'dob' => 'required|date|before:today', // Date of birth is required, a valid date and in the past
            'college_id' => 'required|exists:colleges,id', // College_id exists in the colleges table
        ], [
            'phone.regex' => 'The phone number must be exactly 8 digits long.', // Custom error message to show what format is expected
        ]);
        
        try{
            // Try to save the student and go to the index page with a success message with a success message
            Student::create($request->all());
            return redirect()->route('students.index')->with('message', 'Student has been saved successfully');
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('students.index')->with('error', 'Student was not saved successfully! An error occurred.');
        }
    }

    // Read

    // Display all the students
    // Handles the sort logic
    // Handles the filter logic
    public function index(Request $request)
    {
        try{
            // Try to get the sort and college_id values
            $sort = $request->get('sort', null);
            $college_id = $request->get('college_id', null);
            
            // Try to create a query object
            $query = Student::query();
        
            // If college_id is not null try to add a where to the query
            if ($college_id) {
                $query->where('college_id', $college_id);
            }
        
            // Depending on the value of sort try to order the query accordingly and get the students
            if ($sort == 'name_asc') {
                $students = $query->orderBy('name', 'asc')->get();
            } elseif ($sort == 'name_desc') {
                $students = $query->orderBy('name', 'desc')->get();
            } else {
                $students = $query->get();
            }

            // Try to get all colleges and return to the index page with the students and colleges 
            $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
            return view('students.index', compact('students', 'colleges', 'college_id'));
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('students.index')->with('error', 'Could not show Students! An error occurred.');
        }
    }
    
    // Display student details
    public function show($student_id) {
        try {
            // Try to find the student and go to the show page with the returned student
            $student = Student::find($student_id);
            return view('students.show', compact('student'));
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('students.index')->with('error', 'Could not view Student! An error occurred.');
        }
    }

    // Update

    // Display the edit form
    public function edit($student_id){
        try {
            // Try to find the student, get all the colleges and go to the edit page with the returned student
            $student = Student::find($student_id);
            $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
            return view('students.edit', compact('colleges', 'student'));
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('students.index')->with('error', 'Could not edit Student! An error occurred.');
        }
    }

    // Update the student details from the edit form
    public function update($student_id, Request $request){
        // Validate the form input fields outside of the try to avoid triggering the exception
        $request->validate([
            'name' => 'required', // Name is required
            'email' => 'required|email|unique:students,email,'. $student_id, // Email is required, has to be in an email format and has to be unique
            'phone' => 'required|regex:/^\d{8}$/', // Phone is required and needs to have exactly 8 digits
            'dob' => 'required|date|before:today', // Date of birth is required, a valid date and in the past
            'college_id' => 'required|exists:colleges,id',  // College_id exists in the colleges table
        ], [
            'phone.regex' => 'The phone number must be exactly 8 digits long.', // Custom error message to show what format is expected
        ]);

        try {
            // Try to find the student being edited, save the changes and go to the index page with a success message
            $student = Student::find($student_id);
            $student->update($request->all());
            return redirect()->route('students.index')->with('message', 'Student has been updated successfully');
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return redirect()->route('students.index')->with('error', 'Student was not updated successfully! An error occurred.');
        }
    }

    // Delete

    // Destroy the student with the id $student_id
    public function destroy($student_id) {
        try {
            // Try to find the student being deleted, delete the student and the go back to the same page which is the index page with a success message
            $student = Student::find($student_id);
            $student->delete();
            return back()->with('message', 'Student has been deleted successfully');
        } catch (\Exception $e) {
            // Else go to the index page and display an error message
            return back()->with('error', 'Student was not deleted successfully! An error occurred.');
        }
    }
}