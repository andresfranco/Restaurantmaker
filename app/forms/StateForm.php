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

class StateForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

   $country = new Select('countryid',Country::find(), array(
    'using' => array('id','country')
   ,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Seleccione un País')));
     $country->setLabel('País');
     $this->add($country);

  $state = new Text('state');
  $state->setLabel('Estado');
  $this->add($state);
  //añadimos un botón de tipo submit
$submit = $this->add(new Submit('Guardar', array(
  'class' => 'btn btn-success'
)));


  }

}
