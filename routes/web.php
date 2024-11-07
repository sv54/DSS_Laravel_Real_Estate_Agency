<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Property;
use App\Http\Middleware\AgentAuth;


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
Route::get('/',  [MainController::class, 'showAll'])->name('main.showAll');

Route::get('/admin', [AdminController::class, 'show'])//->name('admin.show');
->middleware('adminAuth')->name('admin.show');

Route::get('/proyecto', function () {
    return view('proyecto');
})->name('proyecto.show');

//Route::get('/main', function () {return view('main');})->name('main.show');

//Rutas de pagina principal

Route::get('main', [MainController::class, 'showAll'])->name('main.showAll');

Route::get('main/filter', [MainController::class, 'filter'])->name('main.filter');


//Rutas para las propiedades

Route::get('properties/update/{id}', [PropertyController::class, 'showUpdate'])->middleware('adminAuth')->name('property.showupdate');

Route::get('properties/updatebyagente/{id}', [PropertyController::class, 'showUpdateAgent'])->middleware('agentAuth')->name('property.showupdateAgente');

Route::post('properties/update', [PropertyController::class, 'update'])->middleware('adminAuth')->name('property.update');

Route::post('properties/updatebyagente', [PropertyController::class, 'updatebyagente'])->middleware('agentAuth')->name('property.updatebyagente');

Route::get('properties/addproperty',[PropertyController::class, 'formulario'])->middleware('adminAuth')->name('addproperty.show');

Route::post('properties/addproperty', [PropertyController::class, 'create'])->middleware('adminAuth')->name('addproperty');

Route::get('properties/newproperty',[PropertyController::class, 'formulario'])->middleware('agentAuth')->name('addpropertyAgente.show');

Route::post('properties/newproperty', [PropertyController::class, 'create'])->middleware('agentAuth')->name('addpropertyAgente');

Route::get('property/{id}', [PropertyController::class, 'show'])->name('properties.show');

Route::get('properties/{by?}', [PropertyController::class, 'showAll'])->middleware('adminAuth')->name('properties.showAll');

Route::post('properties/erase/{id}', [PropertyController::class, 'erase'])->middleware('adminAuth')->name('properties.erase');



//Rutas para los usuarios 


Route::post('users/update', [UserController::class, 'update'])->middleware('adminAuth')->name('user.update');

Route::get('users/update/{id}', [UserController::class, 'showUpdate'])->middleware('adminAuth')->name('user.showupdate');

Route::get('users/adduser',[UserController::class, 'formulario'])->middleware('adminAuth')->name('adduser.show');

Route::post('users/adduser', [UserController::class, 'create'])->middleware('adminAuth')->name('AddUser');

Route::get('users/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('users/{by?}', [UserController::class, 'showAll'])->middleware('adminAuth')->name('users.show');

Route::post('users/delete/{id}', [UserController::class, 'erase'])->middleware('adminAuth')->name('erase_user');

Route::get('user/{id}', [UserController::class, 'showBueno'])->name('user.showBueno');

Route::get('user/update/{id}', [UserController::class, 'showUpdateBueno'])->name('user.showupdateBueno');

Route::post('user/update', [UserController::class, 'updateBueno'])->middleware('agentAuth')->name('user.updateBueno');


//Rutas para las agencias
Route::get('agency/{id}', [AgencyController::class, 'show'])->name('agency.show');

Route::post('agencies/update', [AgencyController::class, 'update'])->middleware('adminAuth')->name('agency.update');

Route::get('agencies/update/{id}', [AgencyController::class, 'showUpdate'])->middleware('adminAuth')->name('agency.showupdate');

Route::get('agencies/addagency',[AgencyController::class, 'formulario'])->middleware('adminAuth')->name('addagency.show');

Route::post('agencies/addagency', [AgencyController::class, 'create'])->middleware('adminAuth')->name('addagency');

Route::get('agencies/{by?}', [AgencyController::class, 'showAll'])->middleware('adminAuth')->name('agencies.showAll');

Route::post('agencies/delete/{id}', [AgencyController::class, 'erase'])->middleware('adminAuth')->name('erase_agency');

Route::get('agencies_public/', [AgencyController::class, 'showAllPublic'])->name('agencies.showAllPublic');

Route::get('agencies_public/filter', [AgencyController::class, 'filter'])->name('agencies_public.filter');


// Rutas para las operaciones
Route::get('operation/{id}', [OperationController::class, 'show'])->middleware('adminAuth')->name('operations.show');

Route::get('operations/addoperation',[OperationController::class, 'formulario'])->middleware('adminAuth')->name('addoperation.show');

Route::post('operations/addoperation', [OperationController::class, 'create'])->middleware('adminAuth')->name('AddOperation');

Route::get('operations/{by?}', [OperationController::class, 'showAll'])->middleware('adminAuth')->name('operations.showAll');

Route::post('operations/delete/{id}', [OperationController::class, 'erase'])->middleware('adminAuth')->name('erase_operation');

Route::get('operations/modoperation/{id}', [OperationController::class, 'modificar_formulario'])->middleware('adminAuth')->name('modificar_operation.show');

Route::post('operations/modoperation', [OperationController::class, 'modificar'])->middleware('adminAuth')->name('modificar_operation');

//Rutas para las Fotos

Route::get('photos/{by?}', [PhotoController::class, 'showAll'])->middleware('adminAuth')->name('photos.showAll');

Route::post('photos/delete/{id}', [PhotoController::class, 'erase'])->middleware('adminAuth')->name('photos.erase');

Route::post('photos/delete/', [PhotoController::class, 'eraseAgent'])->middleware('agentAuth')->name('photos.eraseAgent');

Route::get('photo/{id}', [PhotoController::class, 'show'])->middleware('adminAuth')->name('photo.show');

Route::post('photos/addphotos/', [PhotoController::class, 'addphotos'])->middleware('agentAuth')->name('photos.addphotos');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('register', [RegisterController::class, 'create'])->name('customRegister');