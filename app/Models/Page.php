<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\PagePresenter;
use McCool\LaravelAutoPresenter\HasPresenter;

/**
 * Class Page
 */
class Page extends Model implements HasPresenter
{

  public $timestamps = true;

  protected $fillable = [
    'category_id',
    'title',
    'uri',
    'content',
    'published_at'
  ];

  protected $guarded = [];

  public function getPresenterClass()
  {
    return PagePresenter::class;
  }

  public function scopeUrl($query, $url)
  {
    return $query->where('uri', $url);
  }

}