<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\models\Course;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CoursesController extends Controller
{
  protected $courses;

  public function __construct(Course $courses){
    $this->courses = $courses;
    parent::__construct();
  }

  public function index()
  {
    $courses = $this->courses->paginate(10);
    return view('backend.course.index', compact('courses'))->render();
  }

  public function create(Course $course)
  {
    return view('backend.course.form', compact('course'));
  }

  public function show($id){
    $course = $this->courses->findOrFail($id);
    return view('backend.course.show', compact('course'));
  }

  public function store(Requests\StoreCourseRequest $request){
    $this->courses->create(['user_id' => auth()->user()->id] + $request->only('title', 'description', 'enabled'));
    return redirect(route('backend.courses.index'))->with('status' ,'Курс создан успешно');
  }

  public function confirm($id)
  {
    $course = $this->courses->findOrFail($id);
    return view('backend.course.confirm', compact('course'));
  }

  public function edit($id)
  {
    $course = $this->courses->findOrFail($id);
    return view('backend.course.form', compact('course'));
  }

  public function update(Requests\UpdateCourseRequest $request, $id){
    $course = $this->courses->findOrFail($id);
    $course->fill($request->only('title', 'enabled', 'description','weight'))->save();
    return redirect(route('backend.courses.edit', $course->id))->with('status' ,'Курс обновлен');
  }

  public function destroy($id)
  {
    $course = $this->courses->findOrFail($id);
    $course->delete();
    return redirect(route('backend.course.index'))->with('status' ,'Курс удален');
  }
}
