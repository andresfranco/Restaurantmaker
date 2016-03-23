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

class RestaurantForm extends Form
{
  public function initialize($entity =null , $options=null)
	{


  $name = new Text('name');
  $name->setLabel('Nombre');
  $this->add($name);

  $phone = new Text('phone');
  $phone ->setLabel('Phone');
  $this->add($phone);

  $address = new TextArea("rest_address");
  $address ->setLabel('Address');
  $this->add($address);

  $addressid= new Hidden('addressid');
  $this->add($addressid);

  $email = new Text("email");
  $email->setLabel('email');
  $this->add($email);

  $website = new Text("website");
  $website->setLabel('website');
  $this->add($website);


  }

}
