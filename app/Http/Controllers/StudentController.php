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
        $student = new Student();
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.create', compact('colleges', 'student'));
    }

    // Store the form data
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|regex:/^\d{8}$/',  // Ensure phone has exactly 8 digits
            'dob' => 'required|date|before:today', // Validate that the date of birth is a valid date and in the past
            'college_id' => 'required|exists:colleges,id', // Ensure that college_id exists in the colleges table
        ], [
            'phone.regex' => 'The phone number must be exactly 8 digits long.', // Custom error message to show what format is expected
        ]);
    
        // Create the student
        Student::create($request->all());
    
        // Redirect back to the posts index page with a success message
        return redirect()->route('students.index')->with('message', 'Student has been saved successfully');
    }

    // Read

    // Display students
    // Also handles the sort logic
    // Also handles the filter
    public function index(Request $request)
    {
        $sort = $request->get('sort', null);
        $college_id = $request->get('college_id', null);
    
        $query = Student::query();
    
        if ($college_id) {
            $query->where('college_id', $college_id);
        }
    
        if ($sort == 'name_asc') {
            $students = $query->orderBy('name', 'asc')->get();
        } elseif ($sort == 'name_desc') {
            $students = $query->orderBy('name', 'desc')->get();
        } else {
            $students = $query->get();
        }
    
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
    
        return view('students.index', compact('students', 'colleges', 'college_id'));
    }
    
    // Display student details
    public function show($student_id) {
        $student = Student::find($student_id);
        return view('students.show', compact('student'));
    }

    // Update

    // Display the edit form
    public function edit($student_id){
        $student = Student::find($student_id);
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.edit', compact('colleges', 'student'));
    }

    // Update the user details from the edit form
    public function update($student_id, Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email,'. $student_id, // Exclude the current students email from being unique
            'phone' => 'required|regex:/^\d{8}$/',  // Ensure phone has exactly 8 digits
            'dob' => 'required|date|before:today', // Validate that the date of birth is a valid date and in the past
            'college_id' => 'required|exists:colleges,id', // Ensure that college_id exists in the colleges table
        ], [
            'phone.regex' => 'The phone number must be exactly 8 digits long.', // Custom error message to show what format is expected
        ]);

        $student = Student::find($student_id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('message', 'Student has been updated successfully');
    }

    // Delete

    // Destroy the student with the id $id
    public function destroy($student_id) {
        $student = Student::findOrFail($student_id); // Ensure it throws an exception if not found
        $student->delete();
        return back()->with('message', 'Student has been deleted successfully');
    }
}