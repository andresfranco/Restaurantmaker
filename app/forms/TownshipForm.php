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

class TownshipForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

  $city = new Select('cityid',City::find(), array(
    'using' => array('id','city')
,'useEmpty' => TRUE,'emptyText' =>  $this->di->get('translate')->_('Seleccione una Ciudad')));
   $city->setLabel('Ciudad');
   $this->add($city);


  $township = new Text('township');
  $township->setLabel('Sector');
  $this->add($township);

  $countryvalue="";
  $statevalue="";
  $city ="";
  if (isset($entity))
 {
   if($entity->getCity())
   {
   $countryvalue=$entity->getCity()->getCountry()->getCountry();
   $statevalue=$entity->getCity()->getState()->getState();
   }
 }
  $country = new Text('country');
  $country ->setLabel('País');
  $country->setDefault($countryvalue);
  $this->add($country);

  $state = new Text('state');
  $state->setDefault($statevalue);
  $state ->setLabel('Estado');
  $this->add($state);



  }

}
