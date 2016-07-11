<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Post extends Model
{
  use PresentableTrait;
  public $presenter = 'App\Presenters\PostPresenter';

  protected $fillable = ['user_id', 'title', 'body', 'slug', 'excerpt', 'published_at'];

  protected $dates = ['published_at'];

  public function setPublishedAtAttribute($value){
    $this->attributes['published_at'] = $value ?: null;
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
