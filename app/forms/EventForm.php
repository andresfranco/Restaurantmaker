<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

class EventForm extends Form
{
  public function initialize($entity =null , $options=null)
	{


  $name = new Text('name');
  $name->setLabel('Name');
  $this->add($name);

  $location = new Text('location');
  $location->setLabel('Location');
  $this->add($location);

  $start_date = new Text('start_date');
  $start_date->setLabel('Start Date');
  $this->add($start_date);

  $finish_date = new Text('finish_date');
  $finish_date->setLabel('Finish Date');
  $this->add($finish_date);

  $description = new TextArea('description');
  $description->setLabel('Descripción');
  $this->add($description);
  

  }

}
