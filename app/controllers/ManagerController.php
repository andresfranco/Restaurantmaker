<?php

class ManagerController extends ControllerBase
{

    public function setlanguageAction($lang="")
    {
      $this->session->set('language', $lang);
      //obtenemos la variable HTTP_REFERER
    $referer = $this->request->getHTTPReferer();

    //si existe la variable HTTP_REFERER redirigimos a la url anterior
    if(strpos($referer, $this->request->getHttpHost()."/")!==false)
    {
        return $this->response->setHeader("Location", $referer);
    } 
    }

}
