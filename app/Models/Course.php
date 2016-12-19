<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 */
class Course extends Model
{

  public $timestamps = true;

  protected $fillable = [
    'description',
    'plan',
    'title',
    'weight',
    'enabled',
    'page_image',
    'meta_description'
  ];

  protected $guarded = [];

  public function sections()
  {
    $sections = $this->hasMany('App\Models\CourseSection', 'cid', 'id')->orderBy('weight', 'asc');
    return $sections;
  }

  public function scopeEnabled($query, $flag)
  {
    return $query->where('courses.enabled', $flag)->orderBy('weight', 'asc');
  }

  public function scopeFavorite($query)
  {
    return $query->join('user_courses','user_courses.course_id','=','courses.id');
  }

  public function getProgressBar(){

  }
}