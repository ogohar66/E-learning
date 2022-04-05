<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('dashboard');
})->name('home');
Route::get('/available-Courses', function () {
    if(auth()->user()?->role==='student')
    {
        $courses=\App\Models\Course::whereNotIn('id',function ($query){
            $query->select('course_id')
                ->from('enrollments')
                ->where('user_id','=',auth()->user()->id);
        })->get();
    }elseif (auth()->user()?->role==='teacher')
    {

        $courses=\App\Models\Course::whereNotIn('id',function ($query){
            $query->select('course_id')
                ->from('enrollments')
                ->where('user_id','=',auth()->user()->id);
        })->where('user_id','!=',auth()->user()->id)->get();
    }
    else{

        $courses=\App\Models\Course::all();
    }

    return view('courses',
        ['courses'=>$courses]);
})->name('available-Courses');
Route::get('/', function () {
    return view('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('about',function (){
    return view('about');
})->name('about');
Route::get('contact',function (){
    return view('contact');
})->name('contact');

Route::middleware('can:teacher')->group(function (){
    Route::resource('/courses',\App\Http\Controllers\CourseController::class)->except(['index','show']);
});
Route::get('/courses',[\App\Http\Controllers\CourseController::class,'index'])->middleware('auth')->name('courses.index');
Route::get('/courses/{course}',[\App\Http\Controllers\CourseController::class,'show'])->name('courses.show');
Route::get('enrolment/{course}/enroll',[\App\Http\Controllers\EnrollmentController::class,'enroll'])->name('enroll')->middleware('auth');
Route::get('enrolment/{course}/unenroll',[\App\Http\Controllers\EnrollmentController::class,'unEnroll'])->name('unEnroll')->middleware('auth');
