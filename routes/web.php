<?php
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// College

// Route to show the form to create a new college
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');

// Route to store a new college
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');

// Route to show all colleges
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
 
// Route to show the details of a specific college
Route::get('/colleges/{college_id}', [CollegeController::class, 'show'])->name('colleges.show');

// Route to show the edit form for a specific college
Route::get('/colleges/{college_id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit');

// Route to update the details of a specific college
Route::put('/colleges/{college_id}', [CollegeController::class, 'update'])->name('colleges.update');

// Route to delete a specific college
Route::delete('/colleges/{college_id}', [CollegeController::class, 'destroy'])->name('colleges.destroy');


// Students

// Route to show the form to create a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Route to store a new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Route to show all students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Route to show the details of a specific student
Route::get('/students/{student_id}', [StudentController::class, 'show'])->name('students.show');

// Route to show the edit form for a specific student
Route::get('/students/{student_id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Route to update the details of a specific student
Route::put('/students/{student_id}', [StudentController::class, 'update'])->name('students.update');

// Route to delete a specific student
Route::delete('/students/{student_id}', [StudentController::class, 'destroy'])->name('students.destroy');