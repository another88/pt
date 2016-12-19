<?php
namespace App\Presenters;
use Carbon\Carbon;
use App\Models\Post;
use McCool\LaravelAutoPresenter\BasePresenter;

class PostPresenter extends BasePresenter
{
  public function __construct(Post $resource)
  {
    $this->wrappedObject = $resource;
  }

  public function publishedAt()
  {
    $published = $this->wrappedObject->published_at;

    return Carbon::createFromFormat('Y-m-d H:i:s', $published)
      ->toFormattedDateString();
  }

  public function publishedDateHighlight(){
    if($this->published_at && Carbon::createFromFormat('Y-m-d H:i:s', $this->published_at)->isFuture()){
      return 'info';
    }elseif (!$this->published_at){
      return 'warning';
    }else{
      return 'success';
    }
  }
}