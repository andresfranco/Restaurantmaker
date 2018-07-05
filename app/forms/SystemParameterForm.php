<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

class SystemParameterForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

  $code = new Text('code');
  $code->setLabel('Code');
  $this->add($code);

  $parameter = new Text('parameter');
  $parameter->setLabel('Parameter');
  $this->add($parameter);

  $textvalue = new TextArea('textvalue');
  $textvalue->setLabel('Value');
  $this->add($textvalue);
  }

}
