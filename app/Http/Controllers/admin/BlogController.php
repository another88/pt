<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests;

class BlogController extends Controller
{
  protected $posts;

  public function __construct(Post $posts){
    $this->posts = $posts;
    parent::__construct();
  }

  public function index()
  {
    $posts = $this->posts->with('user')->orderBy('published_at','desc')->paginate(10);
    return view('admin.blog.index', compact('posts'))->render();
  }

  public function create(Post $post)
  {
    return view('admin.blog.form', compact('post'));
  }

  public function store(Requests\StorePostRequest $request){
    $this->posts->create(['user_id' => auth()->user()->id] + $request->only('title', 'slug', 'published_at', 'body', 'excerpt'));
    return redirect(route('admin.blog.index'))->with('status' ,'Блог создан успешно');
  }

  public function confirm($id)
  {
    $post = $this->posts->findOrFail($id);
    return view('admin.blog.confirm', compact('post'));
  }

  public function edit($id)
  {
    $post = $this->posts->findOrFail($id);

    return view('admin.blog.form', compact('post'));
  }

  public function update(Requests\UpdatePostRequest $request, $id){
    $post = $this->posts->findOrFail($id);
    $post->fill($request->only('title', 'slug', 'published_at', 'body', 'excerpt'))->save();
    return redirect(route('admin.blog.edit', $post->id))->with('status' ,'Блог обновлен');
  }

  public function destroy($id)
  {
    $post = $this->posts->findOrFail($id);
    $post->delete();
    return redirect(route('admin.blog.index'))->with('status' ,'Блог был удален');
  }
}
