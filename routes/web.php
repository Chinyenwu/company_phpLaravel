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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/member', 'MemberController@index')->name('member');
Auth::routes();
Route::get('/setup', 'SetupController@index')->name('setup');
Route::get('setup/tasks','DemoController@showTasks');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::resource('users', 'UserController');
Route::resource('imformation_classes', 'Imformation_ClassController');
Route::resource('imformations', 'ImformationController');
Route::get('imformations/index/search','ImformationController@search');
Route::resource('page_classes', 'Page_ClassController');
Route::resource('pages', 'PageController');
Route::get('pages/index/search','PageController@search');
Route::resource('fileroom_classes', 'Fileroom_ClassController');
Route::resource('filerooms', 'FileroomController');
Route::get('filerooms/index/search','FileroomController@search');
Route::resource('positions', 'PositionController');
Route::resource('auth', 'UserController');
Route::get('auth/index/search', 'UserController@search');
Route::resource('networklinks', 'NetworklinkController');
Route::resource('networklink_classes', 'Networklink_ClassController');
Route::resource('person_lists/activities', 'ActivityController');
Route::resource('person_lists/educations', 'EducationController');
Route::resource('person_lists/experiences', 'ExperienceController');
Route::resource('person_lists/honors', 'HonorController');
Route::resource('person_lists/journals', 'JournalController');
Route::resource('person_lists/patents', 'PatentController');
Route::resource('person_lists/projects', 'ProjectController');
Route::resource('person_lists/reserches', 'ReserchController');
Route::resource('person_lists/seminars', 'SeminarController');
Route::resource('person_lists/special_books', 'Special_BookController');
Route::resource('photealbums', 'PhotealbumController');
Route::resource('photealbum_classes', 'Photealbum_ClassController');
Route::resource('photes', 'PhoteController');
Route::resource('advertisings', 'AdvertisingController');
Route::resource('adphotes', 'AdphoteController');
Route::resource('setup/keywords', 'KeywordController');
Route::resource('setup/prefers', 'PreferController');
Route::resource('setup/setupchanges', 'SetupchangeController');
Route::resource('setup/website_informations', 'website_informationController');
//Route::get('adphones/', 'AdphoneController@store')->name('adphones.store');
//Route::patch('setup/tasks/{id}', 'DemoController@updateTasksStatus');
//Route::put('setup/tasks/updateAll', 'DemoController@updateTasksOrder');
/*Route::get('/post/{any}', function () {
  return view('demos/post');
})->where('any', '.*');*/
/*
Route::get('setup/website_information','SetupController@websiteinformation');
Route::get('setup/keyword','SetupController@keyword');
Route::get('setup/prefer','SetupController@prefer');
Route::get('setup/setupchange','SetupController@setupchange');*/
//Route::get('/imformations/indexs', 'ImformationController@indexs')->name('imformations.indexs');