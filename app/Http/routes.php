<?php

/*Route::get('/', function () {
  return view('welcome');
});*/

Route::group(['middleware' => 'web'], function () {

  Route::auth();
  Route::get('/', 'GuestController@index');
  Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'admin'], function () {
  Route::get('backend', ['as' => 'backend', 'uses' => 'backend\AdminController@index']);

  //@startUsers
  Route::resource('backend/users', 'backend\UsersController');
  Route::get('backend/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);
  //@endUsers

  //@startPages
  Route::resource('backend/pages', 'backend\PagesController');
  Route::get('backend/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'Backend\PagesController@confirm']);
  //@endPages

  //@startBlog
  Route::resource('backend/blog', 'backend\BlogController');
  Route::get('backend/blog/{blog}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);
  //@endBlog

  //@startCourse
  Route::resource('backend/courses', 'backend\CoursesController');
  Route::get('backend/courses/{courses}/confirm', ['as' => 'backend.courses.confirm', 'uses' => 'Backend\CourseController@confirm']);
  //@endCourse

  //@startSection
  Route::resource('backend/sections', 'backend\SectionController');
  Route::get('backend/sections/{courses}/confirm', ['as' => 'backend.sections.confirm', 'uses' => 'Backend\SectionController@confirm']);
  Route::get('backend/sections/create/cid/{cid}', 'backend\SectionController@create');
  //@ensSection

  //@startSection
  Route::resource('backend/lessons', 'backend\LessonController');
  Route::get('backend/lessons/{lessons}/confirm', ['as' => 'backend.lessons.confirm', 'uses' => 'Backend\LessonController@confirm']);
  Route::get('backend/lessons/create/sid/{sid}', 'backend\LessonController@create');
  //@ensSection
});