<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests;
use App\Http\Controllers\Backend\Controller;

class PagesController extends Controller
{
  protected $pages;

  public function __construct(Page $pages)
  {
    $this->pages = $pages;
    parent::__construct();
  }

  public function index()
  {
    $pages = $this->pages->all();
    return view('backend.pages.index', compact('pages'));
  }

  public function create(Page $page)
  {
    return view('backend.pages.form', compact('page'));
  }

  public function store(Requests\StorePageRequest $request){
    $this->pages->create($request->only('title', 'uri', 'content', 'category_id'));
    return redirect(route('backend.pages.index'))->with('status' ,'Страница создана успешно');
  }

  public function confirm($id)
  {
    $page = $this->pages->findOrFail($id);
    return view('backend.pages.confirm', compact('page'));
  }

  public function edit($id)
  {
    $page = $this->pages->findOrFail($id);

    return view('backend.pages.form', compact('page'));
  }

  public function update(Requests\UpdatePageRequest $request, $id){
    $page = $this->pages->findOrFail($id);
    $page->fill($request->only('title', 'uri', 'content', 'category_id'))->save();
    return redirect(route('backend.pages.edit', $page->id))->with('status' ,'Page has been updated');
  }

  public function destroy($id)
  {
    $page = $this->pages->findOrFail($id);
    $page->delete();
    return redirect(route('backend.pages.index'))->with('status' ,'Page was deleted');
  }
}
