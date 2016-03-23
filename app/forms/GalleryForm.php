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

class GalleryForm extends Form
{
    public function initialize($entity =null , $options=null)
    {


        $name = new Text('name');
        $name->setLabel('Nombre');
        $this->add($name);

        $title = new Text('title');
        $title->setLabel('Título');
        $this->add($title);

        $type = new Select(
        "type",
        array(
            'image' => 'Imagen',
            'video' => 'Video',
            'mix'   => 'Mixta'
        )
        );
        $type->setLabel('Tipo');
        $this->add($type);

        $description = new TextArea('description');
        $description->setLabel('Descripción');
        $this->add($description);


    }

}
