<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\models\CourseSectionLesson;
/**
 * Class CourseSection
 */
class CourseSection extends Model
{

    public $timestamps = true;

    protected $fillable = [
        'cid',
        'title',
        'page_image',
        'description',
        'weight',
        'enabled',
        'levels'
    ];

    protected $guarded = [];

    public function course(){
        return $this->belongsTo('App\models\Course', 'cid');
    }


    public function lessons()
    {
        return $this->hasMany('App\models\CourseSectionLesson', 'sid', 'id')->orderBy('level', 'asc');
    }

    public function groupLessons(){
        $grLessons = array();
        $lessons = CourseSectionLesson::where("sid", $this->id)->orderBy('level', 'asc')->get();
        foreach (range(1,$this->levels) as $level) {
            $levelLessons = array();
            foreach ($lessons as $lesson) {
                if($lesson->level == $level){
                    $levelLessons[] = $lesson;
                }
            }
            if(count($levelLessons)){
                $grLessons[$level] = $levelLessons;
            }
        }

        return $grLessons;
    }
}