<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CompanyController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for company
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Company", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $company = Company::find($parameters);
        if (count($company) == 0) {
            $this->flash->notice("The search did not find any company");

            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $company,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a company
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $company = Company::findFirstByid($id);
            if (!$company) {
                $this->flash->error("company was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "company",
                    "action" => "index"
                ));
            }

            $this->view->id = $company->id;

            $this->tag->setDefault("id", $company->getId());
            $this->tag->setDefault("name", $company->getName());
            
        }
    }

    /**
     * Creates a new company
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "index"
            ));
        }

        $company = new Company();

        $company->setId($this->request->getPost("id"));
        $company->setName($this->request->getPost("name"));
        

        if (!$company->save()) {
            foreach ($company->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "new"
            ));
        }

        $this->flash->success("company was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "company",
            "action" => "index"
        ));

    }

    /**
     * Saves a company edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $company = Company::findFirstByid($id);
        if (!$company) {
            $this->flash->error("company does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "index"
            ));
        }

        $company->setId($this->request->getPost("id"));
        $company->setName($this->request->getPost("name"));
        

        if (!$company->save()) {

            foreach ($company->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "edit",
                "params" => array($company->id)
            ));
        }

        $this->flash->success("company was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "company",
            "action" => "index"
        ));

    }

    /**
     * Deletes a company
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $company = Company::findFirstByid($id);
        if (!$company) {
            $this->flash->error("company was not found");

            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "index"
            ));
        }

        if (!$company->delete()) {

            foreach ($company->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "company",
                "action" => "search"
            ));
        }

        $this->flash->success("company was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "company",
            "action" => "index"
        ));
    }

}
