<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\models\CourseSection;
use App\Http\Requests;

class SectionController extends Controller
{
  protected $sections;

  public function __construct(CourseSection $sections){
    $this->sections = $sections;
    parent::__construct();
  }

  public function index()
  {
    $courses = $this->sections->paginate(10);
    return view('backend.sections.index', compact('courses'))->render();
  }

  public function create(CourseSection $section, $cid)
  {
    return view('backend.sections.form', compact('section','cid'));
  }

  public function show($id){
    $course = $this->courses->findOrFail($id);
    return view('backend.sections.show', compact('course'));
  }

  public function store(Requests\StoreSectionRequest $request){
    $section = $this->sections->create(['user_id' => auth()->user()->id] + $request->only('title', 'description', 'enabled', 'weight', 'cid'));
    $file = $request->file('page_image');
    if($file){
      $section->page_image = storeImageFile($file, $section, 'courseSections');
      $section->save();
    }

    return redirect(route('backend.courses.show', $request->get('cid')))->with('status' ,'Секция создана');
  }

  public function confirm($id)
  {
    $course = $this->sections->findOrFail($id);
    return view('backend.sections.confirm', compact('course'));
  }

  public function edit($id)
  {
    $section = $this->sections->findOrFail($id);
    $cid = $section->cid;
    return view('backend.sections.form', compact('section', 'cid'));
  }

  public function update(Requests\UpdateSectionRequest $request, $id){
    $section = $this->sections->findOrFail($id);
    $section->fill($request->only('title', 'enabled', 'description','weight'))->save();

    $file = $request->file('page_image');
    if($file){
      $section->page_image = storeImageFile($file, $section, 'courseSections');
      $section->save();
    }
    
    return redirect(route('backend.sections.edit', $section->id))->with('status' ,'Секция обновлена');
  }

  public function destroy($id)
  {
    $course = $this->sections->findOrFail($id);
    $course->delete();
    return redirect(route('backend.sections.index'))->with('status' ,'Секция удалена');
  }
}
