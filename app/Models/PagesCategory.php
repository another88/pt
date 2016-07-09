<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PagesCategory
 */
class PagesCategory extends Model
{

    public $timestamps = true;

    protected $fillable = [
        'title',
        'subtitle',
        'page_image',
        'meta_description',
        'enabled'
    ];

    protected $guarded = [];

        
}