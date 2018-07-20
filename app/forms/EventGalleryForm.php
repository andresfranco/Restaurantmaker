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

class EventGalleryForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

    $gallery = new Select('galleryid',Gallery::find(), array(
    'using' => array('id','name')
   ,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Seleccione una galeria')));
     $gallery->setLabel('Gallerry');
     $this->add($gallery);

  }

}