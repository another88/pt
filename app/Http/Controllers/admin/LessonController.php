<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CourseSection;
use App\Models\CourseSectionLesson;
use App\Http\Requests;

class LessonController extends Controller
{
  protected $sections;

  public function __construct(CourseSectionLesson $lessons){
    $this->lessons = $lessons;
    parent::__construct();
  }

  public function index()
  {
    $lessons = $this->lessons->paginate(10);
    return view('admin.lessons.index', compact('lessons'))->render();
  }

  public function create(CourseSectionLesson $lesson, $sid)
  {
    $section = CourseSection::find($sid);
    $cid = $section->cid;
    return view('admin.lessons.form', compact('lesson', 'sid', 'cid', 'section'));
  }

  public function show($id){
    $lesson = $this->lessons->findOrFail($id);
    return view('admin.lessons.show', compact('lesson'));
  }

  public function store(Requests\StoreLessonRequest $request){
    $lesson = $this->lessons->create(['user_id' => auth()->user()->id] + $request->only('title', 'body', 'enabled', 'weight', 'sid', 'level', 'youtube', 'description'));
    $file = $request->file('page_image');
    $lesson->level = $lesson->level + 1;
    if($file){
      $lesson->page_image = storeImageFile($file, $lesson, 'sectionLessons');
    }
    $lesson->save();
    return redirect(route('admin.courses.show', $request->get('cid')))->with('status' ,'Урок создан успешно');
  }

  public function confirm($id)
  {
    $lesson = $this->lessons->findOrFail($id);
    return view('admin.lessons.confirm', compact('lesson'));
  }

  public function edit($id)
  {
    $lesson = $this->lessons->findOrFail($id);
    $sid = $lesson->sid;
    $section = CourseSection::find($sid);
    $cid = $section->cid;
    
    return view('admin.lessons.form', compact('section', 'sid', 'lesson', 'cid'));
  }

  public function update(Requests\StoreLessonRequest $request, $id){
    $lesson = $this->lessons->findOrFail($id);
    $lesson->fill($request->only('title', 'enabled', 'body','weight', 'youtube', 'description'))->save();

    $file = $request->file('page_image');
    if($file){
      $lesson->page_image = storeImageFile($file, $lesson, 'courseSections');
      $lesson->save();
    }
    
    return redirect(route('admin.lessons.edit', $lesson->id))->with('status' ,'Урок обновлен');
  }

  public function destroy($id)
  {
    $lesson = $this->lessons->findOrFail($id);
    $lesson->delete();
    return redirect(route('admin.lessons.index'))->with('status' ,'Урок удален');
  }
}
