<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [HomeController::class, 'index']);



// Super Admin
Route::get('/admin/login', [LoginController::class, 'showLoginForm']);
Route::post('/admin/login',[LoginController::class, 'login' ]);
Route::post('/admin/logout', [LoginController::class, 'logout' ]);
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Auth::routes();
Route::get('admin/dashboard', [AdminController::class, 'index']);


// Route::get('admin/', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::post('admin/update_settings', [AdminController::class, 'update_settings']);
Route::get('admin/settings', [AdminController::class, 'settings']);
Route::get('admin/edit_page/{page_slug}', [AdminController::class, 'edit_page']);
Route::post('admin/update_page', [AdminController::class, 'update_page']);
Route::post('admin/section_status', [AdminController::class, 'section_status']);
Route::post('admin/delete_section', [AdminController::class, 'delete_section']);
Route::get('admin/blogs', [AdminController::class, 'blogs_listing']);
Route::get('admin/add-blog', [AdminController::class, 'add_blog']);
Route::post('admin/postblog', [AdminController::class, 'post_blog']);
Route::get('admin/edit_blog/{id}', [AdminController::class, 'edit_blog']);
Route::post('admin/delete_blog', [AdminController::class, 'delete_blog']);
Route::post('admin/updateblog', [AdminController::class, 'update_blog']);
Route::get('admin/edit_page_sections/{page_slug}', [AdminController::class, 'edit_sub_sections']);
Route::post('admin/sub_section_status', [AdminController::class, 'sub_section_status']);
Route::post('admin/update_sub', [AdminController::class, 'update_sub']);
Route::post('admin/add_sub_section', [AdminController::class, 'add_sub_section']);  








//Front Side
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('crm', [HomeController::class, 'crm_page']);