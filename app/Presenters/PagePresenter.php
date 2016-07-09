<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter {

  public function prettyUri()
  {
    return '/'.ltrim($this->uri, '/');
  }

}