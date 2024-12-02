<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\IntakeController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\AmountController;
use App\Http\Controllers\IetlsController;
use App\Http\Controllers\PteController;
use App\Http\Controllers\PgIetelController;
use App\Http\Controllers\PgPteController;
use App\Http\Controllers\ProcessingController;
use App\Http\Controllers\InitiatedController;
use App\Http\Controllers\BcvalueController;
use App\Http\Controllers\BvalueController;
use App\Http\Controllers\HandledController;
use App\Http\Controllers\BikalpController;
use App\Models\University;

Route::get('/', function () {
    return view('auth.admin');
});

Route::get('/dashboard', function () {
    $universities = University::all();
    return view('dashboard', compact('universities'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [ProfileController::class, 'admin'])->name('profile.admin');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*registration start */

Route::get('/form/create', [FormController::class, 'create'])->name('backend.form.create');
Route::get('/form/index', [FormController::class, 'index'])->name('backend.form.index');
Route::post('/form/store', [FormController::class, 'store'])->name('backend.form.store');
Route::get('form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
Route::put('form/{id}', [FormController::class, 'update'])->name('backend.form.update');
Route::delete('form/{id}', [FormController::class, 'destroy'])->name('form.destroy');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::post('/student-form', [StudentController::class, 'store'])->name('student.store');

Route::post('/employee-form', [EmployeeController::class, 'store'])->name('store.employee');


Route::post('/bikalp-form', [BikalpController::class, 'store'])->name('store.bikalp');




/*university start */
Route::post('/university/store', [UniversityController::class, 'store'])->name('university.store');
Route::delete('university/{id}', [UniversityController::class, 'destroy'])->name('university.destroy');


/*location start */
Route::post('/locations', [LocationController::class, 'store'])->name('location.store');
Route::delete('destroy/{id}', [LocationController::class, 'destroy'])->name('location.destroy');


/*course start */
Route::post('/store', [CourseController::class, 'store'])->name('course.store');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('course.destroy');


/*intake start */
Route::post('/intake', [IntakeController::class, 'store'])->name('intake.store');
Route::delete('/intakes/{intake}', [IntakeController::class, 'destroy'])->name('intake.destroy');

/*scholarship start */
Route::post('/scholarship', [ScholarshipController::class, 'store'])->name('scholarship.store');
Route::delete('/scholarships/{id}', [ScholarshipController::class, 'destroy'])->name('scholarship.destroy');


/*amount start */
Route::post('/amount', [AmountController::class, 'store'])->name('amount.store');
Route::delete('/amount/{id}', [AmountController::class, 'destroy'])->name('amount.destroy');


/*ug ietls */
Route::post('/ietls', [IetlsController::class, 'store'])->name('ug.store');
Route::delete('/ietls/{id}', [IetlsController::class, 'destroy'])->name('ietl.destroy');

/*pte start */
Route::post('/pte', [PteController::class, 'store'])->name('pte.store');
Route::delete('/pte/{id}', [PteController::class, 'destroy'])->name('pte.destroy');

/*pg ielts start */
Route::post('/pg/store', [PgIetelController::class, 'store'])->name('pg.store');
// In routes/web.php (or routes/api.php)
Route::delete('/pg_ietel/{id}', [PgIetelController::class, 'destroy'])->name('pg_ietel.destroy');


/*pg pte start */
Route::post('/pgpte', [PgPteController::class, 'store'])->name('pgpte.store');
Route::delete('/pg-pte/{id}', [PgPteController::class, 'destroy'])->name('pg_pte.destroy');

/*processing start */
Route::post('/process', [ProcessingController::class, 'store'])->name('process.store');
Route::delete('/processing/{id}', [ProcessingController::class, 'destroy'])->name('processing.destroy');

/*initiated */
Route::post('/initiat', [InitiatedController::class, 'store'])->name('initiat.store');
Route::delete('/initiated/{id}', [InitiatedController::class, 'destroy'])->name('initiated.destroy');


/*bc  */
Route::post('/bcvalue', [BcvalueController::class, 'store'])->name('bcvalue.store');
Route::delete('/bcvalue/{id}', [BcValueController::class, 'destroy'])->name('bcvalue.destroy');

/*bb */
Route::post('/value', [BvalueController::class, 'store'])->name('value.store');
Route::delete('/bvalue/{id}', [BValueController::class, 'destroy'])->name('bvalue.destroy');


/*student handled */
// In routes/web.php
Route::post('/handled', [HandledController::class, 'store'])->name('handled.store');
// In routes/web.php
Route::delete('/handled/{id}', [HandledController::class, 'destroy'])->name('handled.destroy');



