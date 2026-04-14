<?php

use App\Http\Controllers\Api\ActivitiesController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Controllers\Api\ProvincesController;
use App\Http\Controllers\Api\DistrictsController;
use App\Http\Controllers\Api\WardsController;
use App\Http\Controllers\Api\InformationController;
use App\Http\Controllers\Api\CategoriesDetailsController;
use App\Http\Controllers\Api\CareerGoalsController;
use App\Http\Controllers\Api\HistoriesController;
use App\Http\Controllers\Api\TranslateSystemsController;
use App\Http\Controllers\Api\TrainingProcessesController;
use App\Http\Controllers\Api\SkillsController;
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\InformationTechnologyMajorsController;
use App\Http\Controllers\Api\ForeignLanguagesController;
use App\Http\Controllers\Api\LanguagesController;
use App\Http\Controllers\Api\DesiredJobsController;
use App\Http\Controllers\Api\AddressesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => 'activities'], function () {
//     Route::get('/', [ActivitiesController::class, 'index'])->name('activities.index');
// });

// A ----------------

Route::group(['prefix' => 'activities'], function () {
    Route::get('/', [ActivitiesController::class, 'index'])->name('activities.index');
    Route::get('/details/{id}', [ActivitiesController::class, 'details'])->name('activities.edit');
    Route::post('/create', [ActivitiesController::class, 'create'])->name('activities.create');
    Route::post('/update/{id}', [ActivitiesController::class, 'update'])->name('activities.Update');
    Route::delete('/{id}', [ActivitiesController::class, 'delete'])->name('activities.Delete');
});

Route::group(['prefix' => 'addresses'], function () {
    Route::get('/', [AddressesController::class, 'index'])->name('addresses.index');
    Route::post('/', [AddressesController::class, 'create'])->name('addresses.create');
    Route::get('/{id}', [AddressesController::class, 'edit'])->name('addresses.Edit');
    Route::post('/update/{id}', [AddressesController::class, 'update'])->name('addresses.Update');
    Route::delete('/{id}', [AddressesController::class, 'delete'])->name('addresses.Delete');
});
// B ----------------

// C ----------------
Route::group(['prefix' => 'careerGoals'], function () {
    Route::get('/', [CareerGoalsController::class, 'index'])->name('careerGoals.index');
    Route::post('/', [CareerGoalsController::class, 'create'])->name('careerGoals.create');
    Route::get('/{id}', [CareerGoalsController::class, 'edit'])->name('careerGoals.Edit');
    Route::post('/update/{id}', [CareerGoalsController::class, 'update'])->name('careerGoals.Update');
    Route::delete('/{id}', [CareerGoalsController::class, 'delete'])->name('careerGoals.Delete');
});

Route::group(['prefix' => 'categories-details'], function () {
    Route::get('/', [CategoriesDetailsController::class, 'index'])->name('categoriesDetails.index');
    Route::post('/', [CategoriesDetailsController::class, 'create'])->name('categoriesDetails.create');
    Route::get('/{id}', [CategoriesDetailsController::class, 'edit'])->name('categoriesDetails.Edit');
    Route::post('/update/{id}', [CategoriesDetailsController::class, 'update'])->name('categoriesDetails.Update');
    Route::delete('/{id}', [CategoriesDetailsController::class, 'delete'])->name('categoriesDetails.Delete');
});

Route::group(['prefix' => 'countries'], function () {
    Route::get('/', [CountriesController::class, 'index'])->name('countries.index');
    Route::post('/', [CountriesController::class, 'create'])->name('countries.create');
    Route::get('/{id}', [CountriesController::class, 'edit'])->name('countries.Edit');
    Route::post('/update/{id}', [CountriesController::class, 'update'])->name('countries.Update');
    Route::delete('/{id}', [CountriesController::class, 'delete'])->name('countries.Delete');
    Route::get('/storeCountriesApi', [CountriesController::class, 'storeCountriesApi'])->name('countries.storeCountriesApi');
});
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::post('/', [CategoriesController::class, 'create'])->name('categories.create');
    Route::get('/{id}', [CategoriesController::class, 'edit'])->name('categories.Edit');
    Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('categories.Update');
    Route::delete('/{id}', [CategoriesController::class, 'delete'])->name('categories.Delete');
});

// D ----------------
Route::group(['prefix' => 'districts'], function () {
    Route::get('/', [DistrictsController::class, 'index'])->name('districts.index');
    Route::post('/', [DistrictsController::class, 'create'])->name('districts.create');
    Route::get('/{id}', [DistrictsController::class, 'edit'])->name('districts.Edit');
    Route::post('/update/{id}', [DistrictsController::class, 'update'])->name('districts.Update');
    Route::delete('/{id}', [DistrictsController::class, 'delete'])->name('districts.Delete');
    Route::post('/storeDistrictsApi', [DistrictsController::class, 'storeDistrictsApi'])->name('districts.storeDistrictsApi');
});

Route::group(['prefix' => 'desired-jobs'], function () {
    Route::get('/', [DesiredJobsController::class, 'index'])->name('desiredJobs.index');
    Route::post('/', [DesiredJobsController::class, 'create'])->name('desiredJobs.create');
    Route::get('/{id}', [DesiredJobsController::class, 'edit'])->name('desiredJobs.Edit');
    Route::post('/update/{id}', [DesiredJobsController::class, 'update'])->name('desiredJobs.Update');
    Route::delete('/{id}', [DesiredJobsController::class, 'delete'])->name('desiredJobs.Delete');
});



// E ----------------
Route::group(['prefix' => 'experience'], function () {
    Route::get('/', [ExperienceController::class, 'index'])->name('experience.index');
    Route::post('/', [ExperienceController::class, 'create'])->name('experience.create');
    Route::get('/{id}', [ExperienceController::class, 'edit'])->name('experience.Edit');
    Route::post('/update/{id}', [ExperienceController::class, 'update'])->name('experience.Update');
    Route::delete('/{id}', [ExperienceController::class, 'delete'])->name('experience.Delete');
});

// F ----------------
Route::group(['prefix' => 'foreign-languages'], function () {
    Route::get('/', [ForeignLanguagesController::class, 'index'])->name('foreignLanguages.index');
    Route::post('/', [ForeignLanguagesController::class, 'create'])->name('foreignLanguages.create');
    Route::get('/{id}', [ForeignLanguagesController::class, 'edit'])->name('foreignLanguages.Edit');
    Route::post('/update/{id}', [ForeignLanguagesController::class, 'update'])->name('foreignLanguages.Update');
    Route::delete('/{id}', [ForeignLanguagesController::class, 'delete'])->name('foreignLanguages.Delete');
});

// L ----------------

Route::group(['prefix' => 'histories'], function () {
    Route::get('/', [HistoriesController::class, 'index'])->name('histories.index');
    Route::post('/', [HistoriesController::class, 'create'])->name('histories.create');
    Route::get('/{id}', [HistoriesController::class, 'edit'])->name('histories.Edit');
    Route::post('/update/{id}', [HistoriesController::class, 'update'])->name('histories.Update');
    Route::delete('/{id}', [HistoriesController::class, 'delete'])->name('histories.Delete');
});
// I ----------------
Route::group(['prefix' => 'information'], function () {
    Route::get('/', [InformationController::class, 'index'])->name('information.index');
    Route::post('/create', [InformationController::class, 'create'])->name('information.create');
    Route::get('/{id}', [InformationController::class, 'edit'])->name('information.Edit');
    Route::post('/update/{id}', [InformationController::class, 'update'])->name('information.Update');
    Route::delete('/{id}', [InformationController::class, 'delete'])->name('information.Delete');
});

Route::group(['prefix' => 'info-tech-majors'], function () {
    Route::get('/', [InformationTechnologyMajorsController::class, 'index'])->name('InformationTechnologyMajors.index');
    Route::post('/', [InformationTechnologyMajorsController::class, 'create'])->name('InformationTechnologyMajors.create');
    Route::get('/{id}', [InformationTechnologyMajorsController::class, 'edit'])->name('InformationTechnologyMajors.Edit');
    Route::post('/update/{id}', [InformationTechnologyMajorsController::class, 'update'])->name('InformationTechnologyMajors.Update');
    Route::delete('/{id}', [InformationTechnologyMajorsController::class, 'delete'])->name('InformationTechnologyMajors.Delete');
});

// L ----------------

Route::group(['prefix' => 'languages'], function () {
    Route::get('/', [LanguagesController::class, 'index'])->name('languages.index');
    Route::post('/', [LanguagesController::class, 'create'])->name('languages.create');
    Route::get('/{id}', [LanguagesController::class, 'edit'])->name('languages.Edit');
    Route::post('/update/{id}', [LanguagesController::class, 'update'])->name('languages.Update');
    Route::delete('/{id}', [LanguagesController::class, 'delete'])->name('languages.Delete');
    Route::put('/storeLanguageApi', [LanguagesController::class, 'storeLanguageApi'])->name('languages.storeLanguageApi');
});

// P ----------------
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', [ProjectsController::class, 'index'])->name('Projects.index');
    Route::post('/', [ProjectsController::class, 'create'])->name('Projects.create');
    Route::get('/{id}', [ProjectsController::class, 'edit'])->name('Projects.Edit');
    Route::post('/update/{id}', [ProjectsController::class, 'update'])->name('Projects.Update');
    Route::delete('/{id}', [ProjectsController::class, 'delete'])->name('Projects.Delete');
});

Route::group(['prefix' => 'provinces'], function () {
    Route::get('/', [ProvincesController::class, 'index'])->name('provinces.index');
    Route::post('/', [ProvincesController::class, 'create'])->name('provinces.create');
    Route::get('/{id}', [ProvincesController::class, 'edit'])->name('provinces.Edit');
    Route::post('/update/{id}', [ProvincesController::class, 'update'])->name('provinces.Update');
    Route::delete('/{id}', [ProvincesController::class, 'delete'])->name('provinces.Delete');
    Route::put('/getList', [ProvincesController::class, 'apiDataList'])->name('provinces.apiDataList');
});

// S ----------------
Route::group(['prefix' => 'skills'], function () {
    Route::get('/', [SkillsController::class, 'index'])->name('skills.index');
    Route::post('/', [SkillsController::class, 'create'])->name('skills.create');
    Route::get('/{id}', [SkillsController::class, 'edit'])->name('skills.Edit');
    Route::post('/update/{id}', [SkillsController::class, 'update'])->name('skills.Update');
    Route::delete('/{id}', [SkillsController::class, 'delete'])->name('skills.Delete');
});

// T ----------------
Route::group(['prefix' => 'training-processes'], function () {
    Route::get('/', [TrainingProcessesController::class, 'index'])->name('trainingProcesses.index');
    Route::post('/', [TrainingProcessesController::class, 'create'])->name('trainingProcesses.create');
    Route::get('/{id}', [TrainingProcessesController::class, 'edit'])->name('trainingProcesses.Edit');
    Route::post('/update/{id}', [TrainingProcessesController::class, 'update'])->name('trainingProcesses.Update');
    Route::delete('/{id}', [TrainingProcessesController::class, 'delete'])->name('trainingProcesses.Delete');
});

Route::group(['prefix' => 'translate-systems'], function () {
    Route::get('/', [TranslateSystemsController::class, 'index'])->name('translateSystems.index');
    Route::post('/', [TranslateSystemsController::class, 'create'])->name('translateSystems.create');
    Route::get('/{id}', [TranslateSystemsController::class, 'edit'])->name('translateSystems.Edit');
    Route::post('/update/{id}', [TranslateSystemsController::class, 'update'])->name('translateSystems.Update');
    Route::delete('/{id}', [TranslateSystemsController::class, 'delete'])->name('translateSystems.Delete');
});

// w ----------------

Route::group(['prefix' => 'wards'], function () {
    Route::get('/', [WardsController::class, 'index'])->name('wards.index');
    Route::post('/', [WardsController::class, 'create'])->name('wards.create');
    Route::get('/{id}', [WardsController::class, 'edit'])->name('wards.Edit');
    Route::post('/update/{id}', [WardsController::class, 'update'])->name('wards.Update');
    Route::delete('/{id}', [WardsController::class, 'delete'])->name('wards.Delete');
    Route::post('/storeWardsApi', [WardsController::class, 'storeWardsApi'])->name('districts.storeWardsApi');
});