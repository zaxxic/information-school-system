<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Class1Controller;
use App\Http\Controllers\ClassUserController;
use App\Http\Controllers\EkstraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\UsersController;
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



// Route::get('/', function () {
//     return view('welcome');
// })->name('contact');

// Route::get('/', function () {
//     return view('user.home');
// })->name('home');

//prefix profile
Route::get('/reset/password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('reset');

Route::get('/', [HomeController::class, 'index'])->name('home');


//prefix kelas
Route::prefix('kelas')->group(function () {
    Route::get('/1', [ClassUserController::class, 'class1'])->name('class1');
    Route::get('/2', [ClassUserController::class, 'class2'])->name('class2');
    Route::get('/3', [ClassUserController::class, 'class3'])->name('class3');
    Route::get('/4', [ClassUserController::class, 'class4'])->name('class4');
    Route::get('/5', [ClassUserController::class, 'class5'])->name('class5');
    Route::get('/6', [ClassUserController::class, 'class6'])->name('class6');
});

Route::get('/kelas/{id}/{slug}', [ClassUserController::class, 'show'])->name('class.show');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', [InformationController::class, 'home'])->name('admin.home')->middleware('auth');

    Route::post('/update-pass', [UsersController::class, 'update_pass'])->name('change.password');


    Route::get('/app', function () {
        return view('admin.app');
    });


    // announcement
    Route::resource('announcement', AnnouncementController::class);
    Route::resource('prestation', PrestationController::class);
    Route::resource('ekstra', EkstraController::class);

    // Route::resource('kelas1', Class1Controller::class);

    Route::get('/kelas1', [Class1Controller::class, 'index1'])->name('kelas1.index');
    Route::get('/kelas2', [Class1Controller::class, 'index2'])->name('kelas2.index');
    Route::get('/kelas3', [Class1Controller::class, 'index3'])->name('kelas3.index');
    Route::get('/kelas4', [Class1Controller::class, 'index4'])->name('kelas4.index');
    Route::get('/kelas5', [Class1Controller::class, 'index5'])->name('kelas5.index');
    Route::get('/kelas6', [Class1Controller::class, 'index6'])->name('kelas6.index');
    Route::post('/filter', [Class1Controller::class, 'filter'])->name('filter');

    Route::get('/kelas/create', [Class1Controller::class, 'create'])->name('kelas1.create');
    Route::get('/kelas/edit/{id}', [Class1Controller::class, 'edit'])->name('kelas1.edit');
    Route::put('/kelas/{id}', [Class1Controller::class, 'update'])->name('kelas1.update');
    // Route::put('/kelas1/{id}', 'Class1Controller@update')->name('kelas1.update');
    Route::delete('/kelas/create/{id}', [Class1Controller::class, 'destroy'])->name('kelas1.destroy');
    Route::post('/kelas/store', [Class1Controller::class, 'store'])->name('kelas1.store');


    Route::middleware(['admin'])->group(function () {

        Route::resource('pengguna', UsersController::class);


        Route::put('/kelas/acc/{id}', [ApprovalController::class, 'class_acc'])->name('accepted.class');
        Route::put('/kelas/deactivate/{id}', [ApprovalController::class, 'class_deactivate'])->name('deactive.class');

        Route::put('/pengumumman/acc/{id}', [ApprovalController::class, 'announcement_acc'])->name('accepted.announcement');
        Route::put('/pengumumman/deactivate/{id}', [ApprovalController::class, 'announcement_deactivate'])->name('deactive.announcement');

        Route::put('/ekstra/acc/{id}', [ApprovalController::class, 'ekstra_acc'])->name('accepted.ekstra');
        Route::put('/ekstra/deactivate/{id}', [ApprovalController::class, 'ekstra_deactivate'])->name('deactive.ekstra');


        Route::get('jenis/ekstra/', [EkstraController::class, 'ekstra_index'])->name('ekstrakurikuler.index');
        Route::post('jenis/ekstra/', [EkstraController::class, 'ekstra_create'])->name('ekstrakurikuler.create');
        Route::put('/jenis/ekstra/{id}', [EkstraController::class, 'ekstra_edit'])->name('ekstrakurikuler.edit');
        Route::delete('/jenis/ekstra/{id}', [EkstraController::class, 'ekstra_destroy'])->name('ekstrakurikuler.destroy');

        Route::get('/sambutan', [InformationController::class, 'admin_greeting'])->name('sambutan.admin');
        Route::post('/sambutan/update', [InformationController::class, 'update_greeting'])->name('sambutan.update');


        Route::get('/sejarah', [InformationController::class, 'admin_history'])->name('history.admin');
        Route::post('/sejarah/update', [InformationController::class, 'update_history'])->name('sejarah.update');


        Route::get('/visi', [InformationController::class, 'admin_visi'])->name('visi.admin');
        Route::post('/visi/update', [InformationController::class, 'update_visi'])->name('visi.update');


        Route::get('/kontak', [InformationController::class, 'admin_contact'])->name('contact.admin');
        Route::post('/kontak/update', [InformationController::class, 'update_contact'])->name('contact.update');
    });
});


Auth::routes();
Route::get('/sambutan', [InformationController::class, 'index_greeting'])->name('greeting');
Route::get('/sejarah', [InformationController::class, 'index_history'])->name('history');
Route::get('/kontak', [InformationController::class, 'index_kontak'])->name('contact');
Route::get('/visi-misi', [InformationController::class, 'index_visi'])->name('visi');
Route::get('/pengumuman', [AnnouncementController::class, 'index_announcement'])->name('announcement');
Route::get('/prestasi', [PrestationController::class, 'index_prestation'])->name('prestation');
Route::get('/prestasi/{slug}', [PrestationController::class, 'shows'])->name('prestation.show');
Route::get('/pengumuman/{slug}', [AnnouncementController::class, 'shows'])->name('announcement.show');
Route::get('/ekstrakurikuler', [EkstraController::class, 'index_ekstra'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{name}', [EkstraController::class, 'show_index'])->name('ekstrakurikuler.show_index');
Route::get('/ekstrakurikuler/{slug}', [EkstraController::class, 'shows'])->name('ekstra.show');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
