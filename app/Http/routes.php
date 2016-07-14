<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::group(['middleware' => 'admin', 'prefix' => '/admin'], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'admin\AdminController@index']);

    Route::resource('users', 'admin\UsersController');
    Route::get('users/{users}/confirm', ['as' => 'admin.users.confirm', 'uses' => 'Admin\UsersController@confirm']);

    //@startPages
    Route::resource('pages', 'admin\PagesController');
    Route::get('pages/{pages}/confirm', ['as' => 'admin.pages.confirm', 'uses' => 'Admin\PagesController@confirm']);
    //@endPages

    //@startBlog
    Route::resource('blog', 'admin\BlogController');
    Route::get('blog/{blog}/confirm', ['as' => 'admin.blog.confirm', 'uses' => 'Admin\BlogController@confirm']);
    //@endBlog

    //@startCourse
    Route::resource('courses', 'admin\CoursesController');
    Route::get('courses/{courses}/confirm', ['as' => 'admin.courses.confirm', 'uses' => 'Admin\CourseController@confirm']);
    //@endCourse

    //@startSection
    Route::resource('sections', 'admin\SectionController');
    Route::get('sections/{courses}/confirm', ['as' => 'admin.sections.confirm', 'uses' => 'Admin\SectionController@confirm']);
    Route::get('sections/create/cid/{cid}', 'Admin\SectionController@create');
    //@ensSection

    //@startSection
    Route::resource('lessons', 'admin\LessonController');
    Route::get('lessons/{lessons}/confirm', ['as' => 'admin.lessons.confirm', 'uses' => 'Admin\LessonController@confirm']);
    Route::get('lessons/create/sid/{sid}', 'Admin\LessonController@create');
    //@ensSection
});