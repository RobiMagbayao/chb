<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AdminBookings;
use App\Http\Controllers\AdminContactus;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMessages;
use App\Http\Controllers\AdminQuotes;
use App\Http\Controllers\AdminUsers;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GuttercleaningController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PrivatepolicyController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TermsandconditionController;
use App\Http\Controllers\UserBookings;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMessages;
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

Route::get('/',[AppController::class, 'index'])->name('app.index');
Route::get('/aboutus',[AboutusController::class, 'index'])->name('aboutus.index');
Route::get('/location',[LocationController::class, 'index'])->name('location.index');
Route::get('/faq',[FaqController::class, 'index'])->name('faq.index');
Route::get('/services',[ServicesController::class, 'index'])->name('services.index');
Route::get('/privatepolicy',[PrivatepolicyController::class, 'index'])->name('privatepolicy.index');
Route::get('/termsandcondition',[TermsandconditionController::class, 'index'])->name('termsandcondition.index');

Route::get('/guttercleaning',[GuttercleaningController::class, 'index'])->name('guttercleaning.index');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/my-bookings',[UserBookings::class,'index'])->name('user.userBookings');
});



Route::middleware('auth')->group(function(){
    Route::get('/my-messages',[UserMessages::class,'index'])->name('user.userMessages');
});

Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});

Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('/admin/bookings',[AdminBookings::class,'index'])->name('admin.adminBookings');
});




Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('/admin/messages',[AdminMessages::class,'index'])->name('admin.adminMessages');
});





//CONTACT US FORM
Route::get('/contactus',[ContactusController::class, 'index'])->name('contactus.index'); //redirect to contact us form
Route::post('/contactus', [ContactusController::class, 'store'])->name('contactus.store'); //contact us store data
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::delete('/admin/contactus/{contactMessage}', [AdminContactus::class, 'destroy'])->name('admin.contactus.destroy'); //contact us delete
});
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('/admin/contactus',[AdminContactus::class,'index'])->name('admin.adminContactus'); //redirect to admin
});
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::patch('/admin/contactus/{contactMessage}', [AdminContactus::class, 'updateStatus'])->name('admin.contactus.updateStatus'); //update status
});

//USER PROFILE
Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index'); //redirect to profile page
});
Route::middleware('auth')->group(function(){
    Route::get('/my-account/edit', [UserController::class, 'edit']);
});
Route::middleware('auth')->group(function(){
    Route::put('/my-account/edit', [UserController::class, 'update']);
});
Route::middleware('auth')->group(function(){
    Route::get('/my-account/delete', [UserController::class, 'destroy']);
});

//ADMIN USER
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('/admin/users',[AdminUsers::class,'index'])->name('admin.adminUsers');
});

Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('admin/users/create',[AdminUsers::class,'create']);
});

Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::post('admin/users/create',[AdminUsers::class,'store']);
});

Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('admin/users/{id}/edit',[AdminUsers::class,'edit']);
});
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::put('admin/users/{id}/edit', [AdminUsers::class,'update']);
});

Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('admin/users/{id}/delete', [AdminUsers::class,'destroy']);
});


//QUOTE
Route::middleware('auth')->group(function(){
    Route::get('/my-quotes',[QuoteController::class,'index'])->name('user.userQuotes');
});
Route::middleware('auth')->group(function(){
    Route::get('/my-quotes/{id}/delete',[QuoteController::class,'destroy']);
});


//GUTTER CLEANING QUOTE
Route::middleware('auth')->group(function(){
    Route::get('gutter_cleaning', [QuoteController::class, 'GutterCleaning']);
});
Route::middleware('auth')->group(function(){
    Route::post('gutter_cleaning', [QuoteController::class, 'store']);
});
Route::middleware('auth')->group(function(){
    Route::get('gutter_cleaning/{id}/edit', [QuoteController::class, 'GutterCleaningEdit']);
});
Route::middleware('auth')->group(function(){
    Route::put('gutter_cleaning/{id}/edit', [QuoteController::class, 'update']);
});

//GUTTER GUARD INSTALLATION QUOTE
Route::middleware('auth')->group(function(){
    Route::get('gutter_guard_installation', [QuoteController::class, 'GutterGuardInstallation']);
});
Route::middleware('auth')->group(function(){
    Route::post('gutter_guard_installation', [QuoteController::class, 'store']);
});
Route::middleware('auth')->group(function(){
    Route::get('gutter_guard_installation/{id}/edit', [QuoteController::class, 'GutterGuardInstallationEdit']);
});
Route::middleware('auth')->group(function(){
    Route::put('gutter_guard_installation/{id}/edit', [QuoteController::class, 'update']);
});

//POWER WASH QUOTE
Route::middleware('auth')->group(function(){
    Route::get('power_wash', [QuoteController::class, 'PowerWash']);
});
Route::middleware('auth')->group(function(){
    Route::post('power_wash', [QuoteController::class, 'store']);
});
Route::middleware('auth')->group(function(){
    Route::get('power_wash/{id}/edit', [QuoteController::class, 'PowerWashEdit']);
});
Route::middleware('auth')->group(function(){
    Route::put('power_wash/{id}/edit', [QuoteController::class, 'update']);
});

//ROOF CLEANING QUOTE
Route::middleware('auth')->group(function(){
    Route::get('roof_cleaning', [QuoteController::class, 'RoofCleaning']);
});
Route::middleware('auth')->group(function(){
    Route::post('roof_cleaning', [QuoteController::class, 'store']);
});
Route::middleware('auth')->group(function(){
    Route::get('roof_cleaning/{id}/edit', [QuoteController::class, 'RoofCleaningEdit']);
});
Route::middleware('auth')->group(function(){
    Route::put('roof_cleaning/{id}/edit', [QuoteController::class, 'update']);
});

//SOLAR CLEANING QUOTE
Route::middleware('auth')->group(function(){
    Route::get('solar_cleaning', [QuoteController::class, 'SolarPanelCleaning']);
});
Route::middleware('auth')->group(function(){
    Route::post('solar_cleaning', [QuoteController::class, 'store']);
});
Route::middleware('auth')->group(function(){
    Route::get('solar_cleaning/{id}/edit', [QuoteController::class, 'SolarCleaningEdit']);
});
Route::middleware('auth')->group(function(){
    Route::put('solar_cleaning/{id}/edit', [QuoteController::class, 'update']);
});

//WINDOW CLEANING QUOTE
Route::middleware('auth')->group(function(){
    Route::get('window_cleaning', [QuoteController::class, 'WindowCleaning']);
});
Route::middleware('auth')->group(function(){
    Route::post('window_cleaning', [QuoteController::class, 'store']);
});
Route::middleware('auth')->group(function(){
    Route::get('window_cleaning/{id}/edit', [QuoteController::class, 'WindowCleaningEdit']);
});
Route::middleware('auth')->group(function(){
    Route::put('window_cleaning/{id}/edit', [QuoteController::class, 'update']);
});

//ADMIN
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('/admin/quotes',[QuoteController::class,'adminview'])->name('admin.adminQuotes');
});
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::get('/admin/quotes/{id}/edit', [QuoteController::class, 'adminedit']);
});
Route::middleware(['auth','auth.admin'])->group(function()
{
    Route::put('/admin/quotes/{id}/edit', [QuoteController::class, 'adminupdate']);
});