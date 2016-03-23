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

class TranslationForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

  $language = new Select('languagecode',Language::find(), array(
    'using' => array('code','language')
,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Seleccione un idioma')));
   $language->setLabel('Idioma');
   $this->add($language);


  $key = new Text('translatekey');
  $key->setLabel('Llave');
  $this->add($key);

  $value = new Text('translatevalue');
  $value->setLabel('Valor');
  $this->add($value);


  }

}
