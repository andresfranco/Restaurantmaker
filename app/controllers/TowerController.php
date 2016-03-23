<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Query;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use TowerForm  as TowerForm;

/**
 * @RoutePrefix("/tower")
 */
class TowerController extends ControllerBase
{


    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for tower
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Tower", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $tower = Tower::find($parameters);
        if (count($tower) == 0) {
            $this->flash->notice("The search did not find any tower");

            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $tower,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
    * @Route("/new", methods={"GET","POST"}, name="towernew")
   */
    public function newAction()
    {
         $this->view->form = new TowerForm();
    }

    /**
     * Edits a tower
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $tower = Tower::findFirstByid($id);
            if (!$tower) {
                $this->flash->error("tower was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "tower",
                    "action" => "index"
                ));
            }

            $this->view->id = $tower->id;

            $this->tag->setDefault("id", $tower->getId());
            $this->tag->setDefault("companyid", $tower->getCompanyid());
            $this->tag->setDefault("number", $tower->getNumber());

        }
    }

    /**
     * Creates a new tower
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "index"
            ));
        }

        $tower = new Tower();

        $tower->setId($this->request->getPost("id"));
        $tower->setCompanyid($this->request->getPost("companyid"));
        $tower->setNumber($this->request->getPost("number"));


        if (!$tower->save()) {
            foreach ($tower->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "new"
            ));
        }

        $this->flash->success("tower was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tower",
            "action" => "index"
        ));

    }

    /**
     * Saves a tower edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $tower = Tower::findFirstByid($id);
        if (!$tower) {
            $this->flash->error("tower does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "index"
            ));
        }

        $tower->setId($this->request->getPost("id"));
        $tower->setCompanyid($this->request->getPost("companyid"));
        $tower->setNumber($this->request->getPost("number"));


        if (!$tower->save()) {

            foreach ($tower->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "edit",
                "params" => array($tower->id)
            ));
        }

        $this->flash->success("tower was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tower",
            "action" => "index"
        ));

    }

    /**
     * Deletes a tower
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $tower = Tower::findFirstByid($id);
        if (!$tower) {
            $this->flash->error("tower was not found");

            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "index"
            ));
        }

        if (!$tower->delete()) {

            foreach ($tower->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tower",
                "action" => "search"
            ));
        }

        $this->flash->success("tower was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tower",
            "action" => "index"
        ));
    }

}
