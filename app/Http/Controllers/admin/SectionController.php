<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CourseSection;
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
    return view('admin.sections.index', compact('courses'))->render();
  }

  public function create(CourseSection $section, $cid)
  {
    return view('admin.sections.form', compact('section','cid'));
  }

  public function show($id){
    $section = $this->sections->findOrFail($id);
    return view('admin.sections.show', compact('section'));
  }

  public function store(Requests\StoreSectionRequest $request){
    $section = $this->sections->create(['user_id' => auth()->user()->id] + $request->only('title', 'description', 'enabled', 'weight', 'cid', 'plan'));
    $file = $request->file('page_image');
    if($file){
      $section->page_image = storeImageFile($file, $section, 'courseSections');
      $section->save();
    }

    return redirect(route('admin.sections.show', $section->id))->with('status' ,'Секция создана');
  }

  public function confirm($id)
  {
    $course = $this->sections->findOrFail($id);
    return view('admin.sections.confirm', compact('course'));
  }

  public function edit($id)
  {
    $section = $this->sections->findOrFail($id);
    $cid = $section->cid;
    return view('admin.sections.form', compact('section', 'cid'));
  }

  public function update(Requests\UpdateSectionRequest $request, $id){
    $section = $this->sections->findOrFail($id);
    $section->fill($request->only('title', 'enabled', 'description','weight','plan'))->save();

    $file = $request->file('page_image');
    if($file){
      $section->page_image = storeImageFile($file, $section, 'courseSections');
      $section->save();
    }
    
    return redirect(route('admin.sections.edit', $section->id))->with('status' ,'Секция обновлена');
  }

  public function destroy($id)
  {
    $course = $this->sections->findOrFail($id);
    $course->delete();
    return redirect(route('admin.sections.index'))->with('status' ,'Секция удалена');
  }
}
