<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;

// use App\Http\Controllers\DashboardController;


// use App\Http\Controllers\RegisterController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('students', StudentController::class);

Route::group(['middleware'=> ['auth','ceklevel::admin,siswa']], function(){
    Route::resource('admin', AdminController::class);
    Route::resource('rayons', RayonController::class);
    Route::resource('rayons', RayonController::class);
    Route::resource('rombel', RombelController::class);
    Route::resource('students', StudentController::class);
    Route::resource('absen', AbsenController::class);

    Route::get('/calendar', function () {
        return view('moduls.calendar');
    });

});
// Route::resource('dashboard', DashboardController::class);


// Route::get('register', [RegisterController::class, 'index']);

// // route untuk memberikan function store dari RegisterController kepada /register yang mana methodnya POST
// Route::post('register', [RegisterController::class, 'store']);