<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\StudyGroupController;
use App\Models\study_group;

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

Route::get('/', function () {
    return view('welcome');
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

// study_group links

Route::group(['middleware' => 'web'], function () {
    Route::get('/study-groups/create', 'App\Http\Controllers\StudyGroupController@create')->name('study-groups.create');

    Route::post('/study-groups', 'App\Http\Controllers\StudyGroupController@store')->name('study-groups.store');

    Route::get('/study-groups', 'App\Http\Controllers\StudyGroupController@index')->name('study-groups.index');

    Route::get('/study-groups/{id}', 'App\Http\Controllers\StudyGroupController@show')->name('study-groups.show');

    

    Route::get('/study-groups/{id}/edit', 'App\Http\Controllers\StudyGroupController@edit')->name('study-groups.edit');


    Route::put('/study-groups/{id}', 'App\Http\Controllers\StudyGroupController@update')->name('study-groups.update');

    Route::delete('/study-groups/{id}', 'App\Http\Controllers\StudyGroupController@destroy')->name('study-groups.destroy');

    Route::post('/study-groups/{studyGroup}/join', 'App\Http\Controllers\StudyGroupController@join')->name('study-groups.join');

    Route::get('/study-groups/{studyGroup}/applications/{applicant}/approve', 'App\Http\Controllers\StudyGroupController@showApprovalForm')
    ->name('study-groups.approve-form');

    Route::put('/study-groups/{studyGroup}/approve/{applicant}', 'App\Http\Controllers\StudyGroupController@approve')->name('study-groups.approve');

    Route::get('/study-groups/{studyGroup}/members', 'App\Http\Controllers\MemberController@index')->name('study-groups.members');

    


        // Add more routes as needed
});



// search links
Route::get('/search', 'SearchController@index')->name('search.index');

Route::resource('questions.answers', 'App\Http\Controllers\AnswerController')->shallow();

// questions routes
Route::resource('questions', 'App\Http\Controllers\QuestionController');

Route::get('/questions', 'App\Http\Controllers\QuestionController@index')->name('questions.index');

Route::get('/questions/create', 'App\Http\Controllers\QuestionController@create')->name('questions.create');

Route::post('/questions', 'App\Http\Controllers\QuestionController@store')->name('questions.store');

Route::get('/questions/{question}/edit', 'App\Http\Controllers\QuestionController@edit')->name('questions.edit');

Route::put('/questions/{question}', 'App\Http\Controllers\QuestionController@update')->name('questions.update');

Route::delete('/questions/{question}', 'App\Http\Controllers\QuestionController@destroy')->name('questions.destroy');

Route::post('/questions/{question}/upvote', 'App\Http\Controllers\QuestionController@upvote')->name('questions.upvote');

Route::post('/questions/{question}/downvote', 'App\Http\Controllers\QuestionController@downvote')->name('questions.downvote');

// answers routes

Route::post('/questions/{question}/answers', 'App\Http\Controllers\AnswerController@store')->name('answers.store');

Route::get('/answers/{answer}/edit', 'App\Http\Controllers\AnswerController@edit')->name('answers.edit');

Route::put('/answers/{answer}', 'App\Http\Controllers\AnswerController@update')->name('answers.update');

Route::delete('/answers/{answer}', 'App\Http\Controllers\AnswerController@destroy')->name('answers.destroy');

Route::post('/answers/{answer}/upvote', 'App\Http\Controllers\AnswerController@upvote')->name('answers.upvote');

Route::post('/answers/{answer}/downvote', 'App\Http\Controllers\AnswerController@downvote')->name('answers.downvote');

// auth routes
Auth::routes();

// home routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//dashboard routes
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
