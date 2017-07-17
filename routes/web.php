<?php

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
Route::group(['prefix' => 'admin',
                    'namespace' => 'Admin',
                    'middleware' =>'auth'],
function () {
    Route::get('/', 'CustomersController@dashboard')->name('dashboard');
    Route::get('customers', 'CustomersController@index')->name('customers.index');
    Route::get('customer/create', 'CustomersController@create')->name('customer.create');
    Route::post('customer/create', 'CustomersController@store')->name('customer.store');
    Route::get('customer/edit/{customer}', 'CustomersController@edit')->name('customer.edit');
    Route::put('customer/edit/{customer}', 'CustomersController@update')->name('customer.update');
    Route::put('customer/copy/{customer}', 'CustomersController@copy')->name('customer.copy');
    Route::get('customer/citydropdown', 'CustomersController@dropdown');

    Route::post('schudel/create/{customer}', 'SchudelesController@store')->name('schudel.store');

    Route::get('categories', 'CategoriesController@index')->name('categories.index');
    Route::get('category/create', 'CategoriesController@create')->name('category.create');
    Route::post('category/create', 'CategoriesController@store')->name('category.store');
    Route::get('category/edit/{category}', 'CategoriesController@edit')->name('category.edit');
    Route::post('category/edit/{category}', 'CategoriesController@update')->name('category.update');

    Route::get('types', 'ClientsController@index')->name('clients.index');
    Route::get('type/create', 'ClientsController@create')->name('clients.create');
    Route::post('type/create', 'ClientsController@store')->name('clients.store');
    Route::get('type/edit/{client}', 'ClientsController@edit')->name('clients.edit');
    Route::post('type/edit/{client}', 'ClientsController@update')->name('clients.update');

    Route::get('brands', 'BrandsController@index')->name('brands.index');
    Route::get('brands/create', 'BrandsController@create')->name('brands.create');
    Route::post('brands/create', 'BrandsController@store')->name('brands.store');
    Route::get('brands/edit/{brand}', 'BrandsController@edit')->name('brands.edit');
    Route::post('brands/edit/{brand}', 'BrandsController@update')->name('brands.update');

    Route::get('segmentations', 'SegmentationsController@index')->name('segmentations.index');
    Route::get('segmentations/create', 'SegmentationsController@create')->name('segmentations.create');
    Route::post('segmentations/create', 'SegmentationsController@store')->name('segmentations.store');
    Route::get('segmentations/edit/{segmentation}', 'SegmentationsController@edit')->name('segmentations.edit');
    Route::post('segmentations/edit/{segmentation}', 'SegmentationsController@update')->name('segmentations.update');

    Route::get('variants', 'VariantsController@index')->name('variants.index');
    Route::get('variants/create', 'VariantsController@create')->name('variants.create');
    Route::post('variants/create', 'VariantsController@store')->name('variants.store');
    Route::get('variants/edit/{variant}', 'VariantsController@edit')->name('variants.edit');
    Route::post('variants/edit/{variant}', 'VariantsController@update')->name('variants.update');

    Route::get('areas', 'AreasController@index')->name('areas.index');
    Route::get('areas/create', 'AreasController@create')->name('areas.create');
    Route::post('areas/create', 'AreasController@store')->name('areas.store');
    Route::get('areas/edit/{area}', 'AreasController@edit')->name('areas.edit');
    Route::post('areas/edit/{area}', 'AreasController@update')->name('areas.update');

    Route::get('cities', 'CitiesController@index')->name('cities.index');
    Route::get('cities/create', 'CitiesController@create')->name('cities.create');
    Route::post('cities/create', 'CitiesController@store')->name('cities.store');
    Route::get('cities/edit/{city}', 'CitiesController@edit')->name('cities.edit');
    Route::post('cities/edit/{city}', 'CitiesController@update')->name('cities.update');

    Route::get('coaches', 'CoachesController@index')->name('coaches.index');
    Route::get('coaches/create', 'CoachesController@create')->name('coaches.create');
    Route::post('coaches/create', 'CoachesController@store')->name('coaches.store');
    Route::get('coaches/edit/{coach}', 'CoachesController@edit')->name('coaches.edit');
    Route::put('coaches/edit/{coach}', 'CoachesController@update')->name('coaches.update');

    Route::get('staffs', 'StaffsController@index')->name('staffs.index');
    Route::get('staff/create/{customer}', 'StaffsController@create')->name('staffs.create');
    Route::post('staff/create/{customer}', 'StaffsController@store')->name('staffs.store');
    Route::get('staff/edit/{staff}', 'StaffsController@edit')->name('staffs.edit');
    Route::put('staff/edit/{staff}', 'StaffsController@update')->name('staffs.update');

    Route::get('surveys', 'SurveysController@index')->name('surveys.index');
    Route::post('survey/create', 'SurveysController@create')->name('survey.create');
    Route::get('survey/questions/{survey}', 'SurveysController@options')->name('survey.question');
    Route::put('survey/update/{survey}', 'SurveysController@update')->name('survey.update');
    Route::post('survey/start/{customer}', 'SurveysController@survey_start')->name('survey.start');
    Route::any('survey/close/{survey_start}', 'SurveysController@survey_close')->name('survey.close');

    Route::post('survey/answer/create/{survey}', 'QuestionsController@store')->name('question.create');
    Route::get('survey/answer/correct/{question}', 'QuestionsController@correct')->name('question.correct');
    Route::put('survey/answer/correct/{question}', 'QuestionsController@updatecorrect')->name('question.update.correct');
});


Route::get('/', 'SurveyController@home')->name('home');

// Route::get('/survey/new', 'SurveyController@new_survey')->name('new.survey');
Route::get('/survey/{survey}', 'SurveyController@detail_survey')->name('detail.survey');
Route::get('/survey/view/{survey}', 'SurveyController@view_survey')->name('view.survey');
// Route::post('/survey/view/{survey}', 'SurveyController@store_survey')->name('store.survey');
Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
Route::get('/survey/{survey}/delete', 'SurveyController@delete_survey')->name('delete.survey');

// Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
// Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');

Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');


// Questions related
Route::post('/survey/{survey}/questions', 'QuestionController@store')->name('store.question');

Route::get('/question/{question}/edit', 'QuestionController@edit')->name('edit.question');
Route::patch('/question/{question}/update', 'QuestionController@update')->name('update.question');
Route::auth();

