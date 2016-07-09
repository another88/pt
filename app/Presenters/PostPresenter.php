<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter {

  public function publishedDate(){
    if($this->published_at){
      return $this->published_at->toFormattedDateString();
    }

    return 'Не опубликован';
  }

  public function publishedDateHighlight(){
    if($this->published_at && $this->published_at->isFuture()){
      return 'info';
    }elseif (!$this->published_at){
      return 'warning';
    }
  }
}