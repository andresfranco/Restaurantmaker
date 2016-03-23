<?php

class ErrorController extends ControllerBase
{

    public function error404Action()
    {
      $this->view->pick('error/404');
    }

}
