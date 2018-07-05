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

class ActionRoleForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

    $action = new Select('actionid',Action::find(), array(
      'using' => array('id','action')
     ,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Seleccione una Acción')));
     $action->setLabel('Acción');
     $this->add($action);

  //añadimos un botón de tipo submit
$submit = $this->add(new Submit('Guardar', array(
  'class' => 'btn btn-success'
)));


  }

}
