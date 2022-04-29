<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PostulateController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SurveyController;


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

Route::get('/prueba', function () {
    return view('dashboard.partials.prueba');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/employerConditions', [SolicitudeController::class, 'showConditions'])
->name('solicitudes.showConditions');

Route::resource('solicitudes', SolicitudeController::class);

Route::resource('vacancies', VacancyController::class);

Route::post('/userEmployer/{id}', [EmployerController::class, 'accept_request'])
    ->name('userEmployer.accept_request');

Route::put('/userEmployer/{id}/{action}', [EmployerController::class, 'disable_employer'])
    ->name('employer.disable_employer');


Route::get('/userEmployer/{id}', [EmployerController::class, 'confirm_disable'])
    ->name('employer.confirm_disable');


Route::resource('userEmployer', UserController::class);

Route::resource('user', UserController::class);

Route::resource('student', StudentController::class);
Route::resource('employer', EmployerController::class);
Route::resource('experience', ExperienceController::class);
Route::resource('postulates', PostulateController::class);
Route::resource('surveys', SurveyController::class);


Route::get('/list_employer', function () {
    return view('dashboard.perfil.index');
})->name('list_employer');

Route::get('/employer_vacancies', [EmployerController::class, 'index_perfil'])
        ->name('employers.index_perfil');
        
Route::get('/vacancies_index', [VacancyController::class, 'index_perfil'])
    ->name('vacancies.index_perfil');

Route::put('/vacancies_state/{id}/{state}', [VacancyController::class, 'set_state'])
    ->name('vacancies.set_state');

Route::get('/conoce_mas', function () {
        return view('dashboard.conoce_mas.index');
    })->name('conoce_mas.index');

Route::get('/contact', function () {
        return view('dashboard.contact.index');
    })->name('contact');

Route::get('/contracts/{id}/{id_postulate}', [ContractController::class, 'create_contract'])
                ->name('contracts.created_contract');

Route::resource('contracts', ContractController::class);

Route::get('/postulate/{id}', [PostulateController::class, 'postulate_vacancy'])
                ->name('postulates.list_postulates_vacancy');

Route::put('/userExperience/{id}/{hidden}', [ExperienceController::class, 'change_hidden'])
                ->name('userExperience.change_hidden');

Route::put('/contract/{id}', [ContractController::class, 'change_state'])
                ->name('userContract.change_state');

Route::get('/hasContracts/{id}', [StudentController::class, 'hasContracts'])
                ->name('student.hasContracts');

Route::get('/hasPostulates/{id}', [StudentController::class, 'hasPostulates'])
                ->name('student.hasPostulates');

Route::get('/createSurvey/{id}', [SurveyController::class, 'createSurvey'])
                ->name('survey.createSurvey');