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

class FileForm extends Form
{
  public function initialize($entity =null , $options=null)
	{


  $name = new Text('name');
  $name->setLabel('Name');
  $this->add($name);

  $type = new Text('type');
  $type->setLabel('type');
  $this->add($type);

  $size = new Text('size');
  $size->setLabel('size');
  $this->add($size);

  $path = new TextArea('path');
  $path->setLabel('Path');
  $this->add($path);

  }

}
