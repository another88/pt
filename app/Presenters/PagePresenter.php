<?php
namespace App\Presenters;
use Carbon\Carbon;
use App\Models\Page;
use McCool\LaravelAutoPresenter\BasePresenter;

class PagePresenter extends BasePresenter
{
  public function __construct(Page $resource)
  {
    $this->wrappedObject = $resource;
  }

  public function published_at()
  {
    $published = $this->wrappedObject->published_at;

    return Carbon::createFromFormat('Y-m-d H:i:s', $published)
      ->toFormattedDateString();
  }

  public function prettyUri()
  {
    return '/'.ltrim($this->uri, '/');
  }
}