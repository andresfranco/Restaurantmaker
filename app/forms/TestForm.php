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

class TestForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

  $country = new Select('countryid',Country::find(), array(
    'using' => array('id','country')
,'useEmpty' => TRUE,'emptyText' => 'Seleccione un País'));
   $country->setLabel('Pais');
   $this->add($country);

   if (isset($entity))
  {
    $state = new Select('stateid', State::find(array(
                        "columns"   =>  array("id,state"),
                        "conditions"=>  "id = :id: OR countryid =:countryid:" ,
                        "bind"      =>  array("id"=>$entity->stateid,"countryid"=>$entity->countryid)
                    )), array(
                        "useEmpty" => true,
                        "emptyText" => 'Seleccione un Estado',
                        'using' => array('id', 'state'))
                );
    $state->setLabel('Estado');
    $this->add($state);
  }
  else {
    $state = new Select('stateid',array(),array('useEmpty'=>TRUE,'emptyText'=>'Seleccione un Estado'));
    $state->setLabel('Estado');
    $this->add($state);
  }

  //añadimos un botón de tipo submit
$submit = $this->add(new Submit('Guardar', array(
  'class' => 'btn btn-success'
)));


  }

}
