<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class UsersController extends Controller
{
  protected $users;

  public function __construct(User $users)
  {
    $this->users = $users;

    parent::__construct();
  }

  public function index()
  {
    $users = $this->users->paginate(10);

    return view('admin.users.index', compact('users'));
  }

  public function create(User $user)
  {
    return view('admin.users.form', compact('user'));
  }

  public function store(Requests\StoreUserRequest $request){
    $this->users->create($request->only('name', 'email', 'password', 'is_admin'));
    return redirect(route('admin.users.index'))->with('status' ,'User has been created');
  }

  public function confirm($id)
  {
    $user = $this->users->findOrFail($id);

    return view('admin.users.confirm', compact('user'));
  }

  public function edit($id)
  {
    $user = $this->users->findOrFail($id);

    return view('admin.users.form', compact('user'));
  }

  public function update(Requests\UpdateUserRequest $request, $id){
    $user = $this->users->findOrFail($id);
    $user->fill($request->only('name', 'email', 'password', 'is_admin'))->save();
    return redirect(route('admin.users.edit', $user->id))->with('status' ,'User has been updated'. $request->input('is_admin'));
  }

  public function destroy($id)
  {
    $user = $this->users->findOrFail($id);
    $user->delete();
    return redirect(route('admin.users.index'))->with('status' ,'User was deleted');
  }
}
