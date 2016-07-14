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
        'title',
        'weight',
        'enabled',
        'page_image',
        'meta_description'
    ];

    protected $guarded = [];

    public function sections()
    {
        $sections = $this->hasMany('App\Models\CourseSection', 'cid', 'id');
        return $sections;
    }
}