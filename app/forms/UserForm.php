<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
class UserForm extends Form
{
  public function initialize($entity =null , $options=null)
	{
  // Company
  $username = new Text('username');
  $username->setLabel('User Name');
  $this->add($username);

  $email = new Text('email');
  $email->setLabel('Email');
  $this->add($email);


  $password= new Password('password');
  $password->setLabel('Password');
  $this->add($password);

  $confirm_password= new Password('confirm_password');
  $confirm_password->setLabel('Confirmar Password');
  $this->add($confirm_password);

  //añadimos un botón de tipo submit
//  $submit = $this->add(new Submit('G', array(
  //'class' => 'btn btn-success'
  //)));


  }

}
