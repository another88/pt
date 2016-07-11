<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
/**
 * Class Page
 */
class Page extends Model
{
    use PresentableTrait;
    public $presenter = 'App\Presenters\PagePresenter';

    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'title',
        'uri',
        'content',
        'published_at'
    ];

    protected $guarded = [];

        
}