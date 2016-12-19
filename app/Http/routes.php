<?php
use Illuminate\Support\Facades\Input;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionLesson;
use App\Models\UserCourses;
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);


Route::group(['middleware' => ['auth']], function () {
  Route::get('/courses', ['as' => 'courses.index', 'uses' => 'HomeController@courses']);
  Route::get('/myCourses', ['as' => 'courses.myCourses', 'uses' => 'HomeController@myCourses']);
  Route::get('/course/{id}', ['as' => 'courses.show', 'uses' => 'HomeController@course']);
  Route::get('/section/{id}', ['as' => 'section.show', 'uses' => 'HomeController@section']);
  Route::get('/lesson/{id}/{mark?}', ['as' => 'lesson.show', 'uses' => 'HomeController@lesson']);
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

// Ajax Routes
Route::post('/bind_user_courses', function (\Illuminate\Http\Request $request){
  $course_id = $request->get('course_id');
  $user_id = $request->get('user_id');
  if($course_id)
  {
    UserCourses::firstOrCreate(['course_id' => $course_id, 'user_id' => $user_id, 'enabled' => true, 'status' => UserCourses::STATUS_COURSE_ADDED]);
    return response()->json(['success' => true]);
  }
  else
  {
    return response()->json(['success' => false]);
  }
})->name('bind_user_courses');

Route::post('/sort_courses', function (\Illuminate\Http\Request $request){
  $items = $request->get('items');
  $target = $request->get('target');
  if($items)
  {
    $i = 0;
    foreach($items as $id)
    {
      $i++;
      $item = false;
      if($target == 'course'){
        $item = Course::find($id);
      }
      if($target == 'section'){
        $item = CourseSection::find($id);
      }
      if($target == 'lesson'){
        $item = CourseSectionLesson::find($id);
      }
      if($item){
        $item->weight = $i;
        $item->save();
      }
    }
    return response()->json(['success' => true]);
  }
  else
  {
    return response()->json(['success' => false]);
  }

})->name('sort_courses');