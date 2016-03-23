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

class DishForm extends Form
{
  public function initialize($entity =null , $options=null)
	{


    $category = new Select('categoryid',DishCategory::find(), array(
    'using' => array('id','category')
    ,'useEmpty' => TRUE,'emptyText' => 'Seleccione una Categoria'));
    $category->setLabel('Category');
    $this->add($category);

    $gallery= new Select('galleryid',Gallery::find(), array(
    'using' => array('id','name')
    ,'useEmpty' => TRUE,'emptyText' => 'Seleccione una galeria'));
    $gallery->setLabel('Galeria');
    $this->add($gallery);

    $name= new Text('name');
    $name->setLabel('Name');
    $this->add($name);

    $price= new Text('price');
    $price->setLabel('Price');
    $this->add($price);


    $image_path = new Text('image_path');
    $image_path->setLabel('Image');
    $this->add( $image_path);

    $description = new TextArea('description');
    $description->setLabel('Description');
    $this->add( $description);

  }

}
