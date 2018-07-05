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

class UserRoleForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

    $role = new Select('roleid',Role::find(), array(
      'using' => array('id','role')
     ,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Seleccione un Rol')));
     $role->setLabel('Rol');
     $this->add($role);

  //añadimos un botón de tipo submit
$submit = $this->add(new Submit('Guardar', array(
  'class' => 'btn btn-success'
)));


  }

}
