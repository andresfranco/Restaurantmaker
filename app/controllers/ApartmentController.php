<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Query;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use ApartmentForm as ApartmentForm;

/**
 * @RoutePrefix("/apartment")
 */
class ApartmentController extends ControllerBase
{



  /**
  * @Route("/index", methods={"GET","POST"}, name="apartmentlist")
 */
    public function indexAction()
    {
        $this->persistent->parameters = null;

    }

    /**
    * @Route("/list", methods={"GET","POST"}, name="apartmentlist")
   */
    public function apartmentlistAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Apartment", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $query = $this->modelsManager->createQuery("Select * from Apartmentlist");
        $apartment = $query->execute();
        //$apartment = Apartment::find();

        $paginator = new Paginator(array(
            "data" => $apartment,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();

    }

    public function proceduretest($param1,$param2)
    {
      $robot = Robot::towersp($param1,$param2);
      return $robot;
    }

    public function loadjs()
    {
      $this->assets
         ->collection('ajaxjs')
          ->addJs('js/apartment_js/dependentcombo.js');

    }
    /**
    * @Route("/search", methods={"POST","GET"}, name="apartmentsearch")
   */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Apartment", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        //$parameters["order"] = "id";

        $company =$this->request->getPost("company");
        $tower =$this->request->getPost("tower");
        $name =$this->request->getPost("name");
        //$query = $this->modelsManager->createQuery("Select c.name as company,
        // t.number as tower , a.id as id,a.name  as name from Apartment  a
         //INNER JOIN  Company c on c.id =a.companyid
         //INNER JOIN Tower t on t.id =a.towerid
        // HAVING c.name = :company: AND  t.number = :tower:"
         //);
        $apartment = $this->modelsManager->createBuilder()
                    ->columns(array('c.name as company','t.number as tower' ,'a.id as id','a.name as apartmentname'))
                    ->from(array('a' => 'Apartment'))
                    ->join('Company', 'c.id = a.companyid', 'c')
                    ->join('Tower', 't.id = a.towerid', 't')
                    ->where('c.name LIKE :company:', array('company' => '%' . $company . '%'))
                    ->andWhere('t.number LIKE :tower:', array('tower' => '%' . $tower . '%'))
                    ->andWhere('a.name LIKE :name:', array('name' => '%' . $name . '%'))
                    ->getQuery()
                    ->execute();
              //$query->execute(array("company"=>$company ,"tower"=>$tower));
        //$apartment = Apartment::find($parameters);
        /*if (count($apartment) == 0) {
            $this->flash->notice("The search did not find any apartment");

            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "search"
            ));
        }
*/
        $paginator = new Paginator(array(
            "data" => $apartment,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
      $this->view->pick("apartment/search");
    }

    /**
    * @Route("/new", methods={"GET","POST"}, name="apartmentnew")
   */
    public function newAction()
    {
      $this->loadjs();

      //EJEMPLO CREAR FORMA DESDE EL CONTROLADOR
      //--------------------------------------------------
      /**$form = new Form();

      $form->add(new Text("name"));
      $form->add(new Select('companyid', Company::find(array(
              "columns"   =>  "id, name"

          )), array(
              'useEmpty'  =>  true,
              'emptyText' =>  'Select a company',
              'using'     => array('id', 'name')
          )));
          $form->add(new Select('towerid', array('0' =>  'Select a tower')));
       */
       //---------------------------------------------------------------------
       //EJEMPLO DE LLAMADO A STORE PROCEDURE
       //--------------------------------------------------
       /*$robot = $this->proceduretest('1','Torre 1');
       $this->view->robot = $robot;
      */
      //-----------------------------------------------------

      //EJEMPLO ENVIO DE FORMA A LA VISTA DESDE CLASE
      //----------------------------------------------------

      $this->view->password=$this->security->hash('password');
      $this->view->form =  new ApartmentForm();
      //----------------------------------------------------

    }
     // FUNCION QUE RECIBE DEL LLAMADO DE AJAX
    /**
    * @Route("/gettower/{companyid}", methods={"POST"}, name="gettower")
   */
    public function gettowerAction($companyid)
    {

      $tower = Tower::findBycompanyid($companyid)->toArray();

      echo '<select id="towerid" name ="towerid">';
      echo '<option value ="0" >Select a Tower</option>';
      foreach ($tower as $toweritem)
      {
        echo '<option value ="'.$toweritem["id"].'" >'.$toweritem["number"].'</option>';
      }
      echo '</select>';
    }
    /**
     * Edits a apartment
       * @param string $id
      * @Route("/edit/{id}", methods={"GET"}, name="apartmentedit")
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $apartment = Apartment::findFirstByid($id);
            if (!$apartment) {
                $this->flash->error("apartment was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "apartment",
                    "action" => "index"
                ));
            }

            $this->view->id = $apartment->id;

            $this->tag->setDefault("id", $apartment->getId());
            $this->tag->setDefault("companyid", $apartment->getCompanyid());
            $this->tag->setDefault("towerid", $apartment->getTowerid());
            $this->tag->setDefault("name", $apartment->getName());

        }
    }

    /**
     * Creates a new apartment
     * @Route("/create", methods={"POST"}, name="createapartment")
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "index"
            ));
        }

        $apartment = new Apartment();
        $apartment->setCompanyid($this->request->getPost("companyid"));
        $apartment->setTowerid($this->request->getPost("towerid"));
        $apartment->setName($this->request->getPost("name"));


        if (!$apartment->save()) {
            foreach ($apartment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "new"
            ));
        }

        $this->flash->success("apartment was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "apartment",
            "action" => "index"
        ));

    }

    /**
     * Saves a apartment edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $apartment = Apartment::findFirstByid($id);
        if (!$apartment) {
            $this->flash->error("apartment does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "index"
            ));
        }

        $apartment->setId($this->request->getPost("id"));
        $apartment->setCompanyid($this->request->getPost("companyid"));
        $apartment->setTowerid($this->request->getPost("towerid"));
        $apartment->setName($this->request->getPost("name"));


        if (!$apartment->save()) {

            foreach ($apartment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "edit",
                "params" => array($apartment->id)
            ));
        }

        $this->flash->success("apartment was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "apartment",
            "action" => "index"
        ));

    }

    /**
     * Deletes a apartment
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $apartment = Apartment::findFirstByid($id);
        if (!$apartment) {
            $this->flash->error("apartment was not found");

            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "index"
            ));
        }

        if (!$apartment->delete()) {

            foreach ($apartment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "apartment",
                "action" => "search"
            ));
        }

        $this->flash->success("apartment was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "apartment",
            "action" => "index"
        ));
    }

}
