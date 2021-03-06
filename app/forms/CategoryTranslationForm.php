<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

class CategoryTranslationForm extends Form
{
  public function initialize($entity =null , $options=null)
	{

    $language = new Select('languagecode',Language::find(), array(
      'using' => array('code','language')
  ,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Select a Language')));
     $language->setLabel('Idioma');
     $this->add($language);

     $category= new Text('category');
     $category->setLabel('Category');
     $this->add($category);    

  }

}
