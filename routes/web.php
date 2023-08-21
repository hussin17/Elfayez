<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminCoursesController;
use App\Http\Controllers\Admin\AdminGradeController;
use App\Http\Controllers\Admin\AdminLessonFilesController;
use App\Http\Controllers\Admin\AdminLessonImagesController;
use App\Http\Controllers\Admin\AdminLessonsController;
use App\Http\Controllers\Admin\AdminLessonVideosController;
use App\Http\Controllers\Admin\AdminLevelsController;
use App\Http\Controllers\Admin\AdminMajorController;
use App\Http\Controllers\Admin\AdminRatesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;

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
// });

Route::get('/student', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:student'])->name('student');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Front Pages
// Route::group(function () {
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/course-details/{id}', [CoursesController::class, 'index'])->name('course-details');
Route::get('/lesson/{course_id}/{lesson_id}', [CoursesController::class, 'lessons'])->name('lessons');

// Admin Authentication Pages
Route::name('admin.')->prefix('admin-area')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::resource('/admin-area', AdminHomeController::class)->middleware(['auth', 'verified', 'role:admin']);

    Route::get('/', [AdminHomeController::class, 'index']);

    // Roles & Permissions
    Route::resource('/roles', RolesController::class);
    Route::resource('/permissions', PermissionsController::class);

    Route::resource('/rates', AdminRatesController::class);

    // Major => Grade => Course => Level => Lesson
    Route::resource('/majors', AdminMajorController::class);
    Route::resource('/grades', AdminGradeController::class);
    Route::resource('/courses', AdminCoursesController::class);
    Route::resource('/courses', AdminCoursesController::class);
    Route::resource('/levels', AdminLevelsController::class);
    Route::resource('/lessons', AdminLessonsController::class);

    Route::name('lessons.')->prefix('/lessons')->group(function () {

        Route::resource('/videos', AdminLessonVideosController::class);
        Route::get('/files/create/{id}', [AdminLessonFilesController::class, 'create']);
        Route::resource('/files', AdminLessonFilesController::class);
        Route::resource('/images', AdminLessonImagesController::class);

        // Route::get('/videos/{id}', [AdminLessonsController::class, 'getVideos'])->name('videos');
        // Route::get('/files/{id}', [AdminLessonsController::class, 'getFiles'])->name('files');
        // Route::get('/images/{id}', [AdminLessonsController::class, 'getImages'])->name('images');

        Route::get('/downlaodFile/{name}', [AdminLessonFilesController::class, 'download'])->name('downlaodFile');
    });
});

require __DIR__ . '/auth.php';
