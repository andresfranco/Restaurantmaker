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

class FileFormatForm extends Form
{
  public function initialize($entity =null , $options=null)
	{


  $extension = new Text('extension');
  $extension->setLabel('Extension');
  $this->add($extension);


  $type = new Select("type",array('image' => $this->di->get('translate')->_('Image')
  ,'video' => $this->di->get('translate')->_('Video')
  ,'document'=>$this->di->get('translate')->_('Document')
  ,'other'=>$this->di->get('translate')->_('Other')));
  $type->setLabel('Type');
  $this->add($type);

  $mimetype = new Text('mimetype');
  $mimetype->setLabel('Mime type');
  $this->add($mimetype);

  $accept = new Select("accept",array('T' => $this->di->get('translate')->_('Yes'),'F' => $this->di->get('translate')->_('No')));
  $accept->setLabel('Accept');
  $this->add($accept);


  }

}
