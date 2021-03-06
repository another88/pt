<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseSectionLesson
 */
class CourseSectionLesson extends Model
{

  public $timestamps = true;

  protected $fillable = [
    'sid',
    'title',
    'body',
    'page_image',
    'youtube',
    'weight',
    'level',
    'description',
    'enabled'
  ];

  public function section()
  {
    return $this->belongsTo('App\Models\CourseSection', 'sid');
  }

  public function getNextId()
  {
    $lesson = self::where('weight', '>', $this->weight)->where('sid', $this->sid)->firstOrFail();
    return $lesson->id;
  }

  protected $guarded = [];


}