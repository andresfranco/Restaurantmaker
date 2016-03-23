<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Validation;
use TestForm as TestForm;
/**
 * @RoutePrefix("/test")
 */
class TestController extends ControllerBase
{
 
   /**
  * @Route("/fancybox", methods={"GET"}, name="fancybox")
 */
  public function fancyboxAction()
  {

   $this->view->pick("test/test");

  }

  /**
  * @Route("/validation", methods={"GET"}, name="testvalidation")
 */
  public function angulartestAction()
  {
    $this->assets
       ->collection('angularjs')
        ->addJs('js/angularjs/angular.min.js')
        ->addJs('js/test/testangular.js');

   $this->view->pick("test/angularvalidation");

  }

  public function testclass()
  {
    $var='esta es una prueba';
    return $var;
  }

  /**
  * @Route("/new", methods={"GET"}, name="testnew")
 */
  public function newAction($entity =null)
  {
    $this->assets
       ->collection('angularjs')
        ->addJs('js/angularjs/angular.min.js')
        ->addJs('js/test/testangular.js');
       if (isset($entity))
       {
           $this->view->form = new TestForm($entity,array());
       }
       else {
          $this->view->form = new TestForm();
       }

  }

  /**
  * @Route("/masterpage", methods={"GET"}, name="masterpage")
 */
  public function masterpageAction($entity =null)
  {

       $this->view->pick('layouts/masterpage2');

  }


  /**
  * @Route("/grid", methods={"GET"}, name="testnew")
 */
  public function gridAction($entity =null)
  {
    $this->assets
       ->collection('angularjs')
        ->addJs('js/angularjs/angular.min.js')
        ->addJs('js/test/testangular.js');
        $this->view->pick("test/testgrid");
  }
  // FUNCION QUE RECIBE DEL LLAMADO DE AJAX
 /**
 * @Route("/get_state/{countryid}", methods={"POST"}, name="get_statetest")
*/
 public function get_stateAction($countryid)
 {

   $state= State::findBycountryid($countryid)->toArray();

   $data = array();
           foreach ($state as  $stateitem) {
               $data[]= array(
                   'id'   =>  $stateitem['id'],
                   'state' => $stateitem['state']
               );
           }

 echo json_encode($data);

 }

 // FUNCION QUE RECIBE DEL LLAMADO DE AJAX
/**
* @Route("/getcountries/{pais}", methods={"POST"}, name="getcountries")
*/
public function getcountriesAction($pais)
{

  $country = $this->modelsManager->createBuilder()
              ->columns(array('c.id as id','c.country as country'))
              ->from(array('c' => 'Country'))
              ->where('c.country LIKE :pais:', array('pais' => '%' . $pais . '%'))
              ->getQuery()
              ->execute();

  $data = array();
          foreach ($country as  $countryitem) {
              $data[]= array(
                  'id'   =>  $countryitem['id'],
                  'country' => $countryitem['country']
              );
          }

echo json_encode($data);

}


}
