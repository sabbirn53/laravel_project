<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\multipleImage;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about-us/{category}', [AboutController::class, 'about']);
Route::get('about', [WebsiteController::class, 'about']);
Route::get('contact-us', [ContactController::class, 'contact']);

Route::get('create-person', [PersonController::class, 'create']);
Route::post('store-person', [PersonController::class, 'store']);

Route::get('persons', [PersonController::class, 'all']);

Route::get('edit-person/{id}', [PersonController::class, 'edit']);
Route::post('update-person/{id}', [PersonController::class, 'update']);

Route::get('delete-person/{id}', [PersonController::class, 'delete']);
Route::get('home', [WebsiteController::class, 'home']);



Route::get('contact', [WebsiteController::class, 'contact']);

Route::get('register', [AuthController::class, 'register']);
Route::post('store-register', [AuthController::class, 'storeregister']);

Route::get('login', [AuthController::class, 'login']);
Route::post('store-login', [AuthController::class, 'storelogin']);



Route::middleware(['CheckLoggedIn'])->group(function () {

    Route::get('dashboard', [AuthController::class, 'dashboard']);

    
    Route::middleware(['IsAdmin'])->group(function () {
  
   
        Route::get('/admin-dashboard', function () {
            return 'This is admin dashboard';
        });
      
      
    });
    Route::middleware(['IsStudent'])->group(function () {
      
        Route::get('/student-dashboard', function () {
            return 'This is student dashboard';
        });
       
      
      
    });
});


Route::get('upload', [UploadImageController::class, 'upload']);

Route::post('upload-image', [UploadImageController::class, 'uploadImage']);



// multiple Image 

Route::get('multiple-image', [multipleImage::class, 'multipleImage']);

Route::post('upload-mImage', [multipleImage::class, 'uploadMultipleImage']);


// domPdf 

Route::get('create-pdf-file', [PDFController::class, 'pdfFile']);

// Excel

Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');

Route::get('create-employee', [EmployeeController::class, 'employee']);


