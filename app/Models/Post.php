<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\PostPresenter;
use McCool\LaravelAutoPresenter\HasPresenter;

class Post extends Model implements HasPresenter
{
  
  protected $fillable = ['user_id', 'title', 'body', 'slug', 'excerpt', 'published_at'];

  protected $dates = ['published_at'];

  public function setPublishedAtAttribute($value){
    $this->attributes['published_at'] = $value ?: null;
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function getPresenterClass()
  {
    return PostPresenter::class;
  }
}
