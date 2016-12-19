<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserCourses
 */
class UserCourses extends Model
{

  public $timestamps = true;
  CONST STATUS_COURSE_ADDED = 1;
  CONST STATUS_LESSON_ADDED = 2;
  protected $fillable = [
    'course_id',
    'user_id',
    'section_id',
    'lesson_id',
    'status',
    'enabled'
  ];

  protected $guarded = [];

  public function course()
  {
    return $this->belongsTo('App\Models\Course', 'course_id');
  }

}