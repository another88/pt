<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\Page;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionLesson;
use App\Models\UserCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //$this->middleware('auth');
  }

  /**
   * Show the application index.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $page = Page::Url('about')->first();
    return view('home.index', compact('page'));
  }

  public function courses()
  {
    $courses = Course::Enabled(true)->paginate(10);
    $favorite = false;
    return view('home.courses', compact('courses', 'favorite'))->render();
  }

  public function myCourses(){
    $courses = Course::Enabled(true)->Favorite()->paginate(10);
    $favorite = true;
    return view('home.courses', compact('courses', 'favorite'))->render();
  }

  public function course($id){
    $course = Course::findOrFail($id);
    return view('home.course', compact('course'))->render();
  }

  public function section($id){
    $section = CourseSection::findOrFail($id);
    return view('home.section', compact('section'))->render();
  }

  public function lesson($id, $mark = false){
    $lesson = CourseSectionLesson::findOrFail($id);
    if($mark){
      UserCourses::firstOrCreate(['lesson_id' => $lesson->id, 'section_id' => $lesson->sid, 'course_id' => $lesson->section->course->id, 'user_id' => Auth::user()->id, 'enabled' => true, 'status' => UserCourses::STATUS_LESSON_ADDED]);
    }

    return view('home.lesson', compact('lesson'))->render();
  }
}
