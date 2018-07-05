<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

class AddressForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

    $country = new Select('countryid',Country::find(), array(
    'using' => array('id','country')
   ,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Seleccione un País')));
     $country->setLabel('País');
     $this->add($country);

  if (isset($entity))
  {
   if ($entity->getCountryid())
   {

    $state = new Select('stateid', State::find(array(
                        "columns"   =>  array("id,state"),
                        "conditions"=>  "countryid =:countryid:",
                        "bind"      =>  array("countryid"=>$entity->countryid)
                    )), array(
                        "useEmpty" => true,
                        "emptyText" => $this->di->get('translate')->_('Seleccione un Estado'),
                        'using' => array('id','state'))
                );
    $state->setLabel('Estado');
    $this->add($state);

    $city = new Select('cityid', City::find(array(
                        "columns"   =>  array("id,city"),
                        "conditions"=>  "countryid =:countryid: AND stateid =:stateid: ",
                        "bind"      =>  array("countryid"=>$entity->countryid,"stateid"=>$entity->stateid)
                    )), array(
                        "useEmpty" => true,
                        "emptyText" => $this->di->get('translate')->_('Seleccione una ciudad'),
                        'using' => array('id','city'))
                );
    $city->setLabel('Ciudad');

    $this->add($city);

    $township = new Select('townshipid', Township::find(array(
                        "columns"   =>  array("id,township"),
                        "conditions"=>  "cityid =:cityid:",
                        "bind"      =>  array("cityid"=>$entity->cityid)
                    )), array(
                        "useEmpty" => true,
                        "emptyText" => $this->di->get('translate')->_('Seleccione un Sector'),
                        'using' => array('id', 'township'))
                );
    $township->setLabel('Sector');
    $this->add($township);

    $neighborhood = new Select('neighborhoodid', Neighborhood::find(array(
                        "columns"   =>  array("id,neighborhood"),
                        "conditions"=>  "cityid =:cityid:",
                        "bind"      =>  array("cityid"=>$entity->cityid)
                    )), array(
                        "useEmpty" => true,
                        "emptyText" => $this->di->get('translate')->_('Seleccione un Barrio'),
                        'using' => array('id', 'neighborhood'))
                );
    $neighborhood->setLabel('Barrio');
    $this->add($neighborhood);
   }
   else {
     $this->set_empty_values();
   }
  }
  else {
     $this->set_empty_values();
  }

  $address = new Textarea('address',array("maxlength"=>"400"));
  $address->setLabel('Dirección');
  $this->add($address);

  $description  = new Textarea('description',array("maxlength"=>"100"));
  $description->setLabel('Descripción');
  $this->add($description);
  }

  function set_empty_values()
  {
    $state= new Select('stateid',array(),array('useEmpty'=>TRUE,'emptyText'=> $this->di->get('translate')->_('Seleccione un Estado')));
    $state->setLabel('state');
    $this->add($state);

    $city= new Select('cityid',array(),array('useEmpty'=>TRUE,'emptyText'=> $this->di->get('translate')->_('Seleccione una Ciudad')));
    $city->setLabel('city');
    $this->add($city);

    $township= new Select('townshipid',array(),array('useEmpty'=>TRUE,'emptyText'=>$this->di->get('translate')->_('Seleccione un Sector')));
    $township->setLabel('Sector');
    $this->add($township);

    $neighborhood= new Select('neighborhoodid',array(),array('useEmpty'=>TRUE,'emptyText'=>$this->di->get('translate')->_('Seleccione un Sector')));
    $neighborhood->setLabel('Barrio');
    $this->add($neighborhood);
  }

}
