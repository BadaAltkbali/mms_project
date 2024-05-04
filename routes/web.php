<?php

use App\Http\Controllers\Filter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BanksController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\WahadatController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\BanksBranchController;
use App\Http\Controllers\EmployeeOfficerController;
use App\Http\Controllers\AdjectiveEmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StaticController::class, 'index'])->name('dashboard');
Route::get('/saveSuccess', [StaticController::class, 'save'])->name('saveSuccess');




// Route::resource('users',  UserController::class);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);




    Route::resource('employees',  EmployeeController::class);
    Route::resource('employeesofficer',  EmployeeOfficerController::class);

    Route::get('print', [Filter::class, 'index'])->name('prints');
    Route::get('print_Office', [Filter::class, 'indexOffice'])->name('printsOffice');

    Route::get('printAllEmp', [Filter::class, 'indexAllEmp'])->name('printAllEmp');
    Route::get('print_AllEmpOffice', [Filter::class, 'indexAllEmpOffice'])->name('print_AllEmpOffice');
    
    Route::get('nationals', [Filter::class, 'getNational'])->name('nationals');
    Route::get('nationalsOffice', [Filter::class, 'getNationalOffice'])->name('nationalsOffice');
    Route::get('accountNo', [Filter::class, 'getaccountNo'])->name('accountNo');

    Route::get('print/records', [Filter::class, 'records'])->name('prints/records');
    Route::get('print/recordsOffice', [Filter::class, 'recordsOffice'])->name('prints/recordsOffice');

    Route::resource('wehda',  WahadatController::class);

    Route::resource('Personnel',  PersonnelController::class);
    Route::get('PersonnelEmployees', [PersonnelController::class, 'employees'])->name('Personnel/employee');
    Route::get('PersonnelEmployeesOfficer', [PersonnelController::class, 'employeesOfficer'])->name('Personnel/employeeOfficer');


    Route::get('fleeing', [Filter::class, 'getFleeing'])->name('subList/fleeing');
    Route::get('retired', [Filter::class, 'getRetired'])->name('subList/retired');
    Route::get('stopping', [Filter::class, 'getStopping'])->name('subList/stopping');




    Route::resource('Bank',  BanksController::class);
    Route::resource('Branch',  BanksBranchController::class);
    Route::resource('Adjective',  AdjectiveEmployeeController::class);
});


//for visiting the form page
// Route::view('/upload-form', 'fileupload');

//for uploading to database
Route::post('/upload-form/fileupload', [EmployeeController::class, 'upload'])->name('uploadusers');


Route::get('/AllEmployees', [EmployeeController::class, 'allEmployees'])->name('allEmployees');

//we have to create <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">FileManagerController</mark>

// Route::get('check/role',[UserController::class,'checkRole'])->middleware('roleType');


Route::middleware('splade')->group(function () {
    // Route::view('/', 'welcome');
    // Route::view('/contact', 'contact');
});