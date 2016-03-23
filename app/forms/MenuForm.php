<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

class MenuForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

  $restaurant = new Select('restaurantid',Restaurant::find(), array(
  'using' => array('id','name')
  ,'useEmpty' => TRUE,'emptyText' =>  $this->di->get('translate')->_('Seleccione un Restaurante')));
  $restaurant->setLabel('Pais');
  $this->add($restaurant);

  $name = new Text('name');
  $name->setLabel('Name');
  $this->add($name);

  $active = new Select("active"
  ,array('Y' => $this->di->get('translate')->_('Yes'),'N' => $this->di->get('translate')->_('No'))
  ,array('class' =>'form-control'));
  $active->setLabel('active');
  $this->add($active);

  }

}
