<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Forms\Element\Numeric;

class ArticleForm extends Form
{
    public function initialize($entity =null , $options=null)
    {


        $title = new Text('title',array(
        'class'   =>'form-control'
        ));
        $title->setLabel('Title');
        $this->add($title);

        $author = new Text('author',array(
            'class'   =>'form-control'
        ));
        $author->setLabel('Author');
        $this->add($author);

        $content = new TextArea('content',array(
            'id' =>'summernote'
             ,'name'=>'content',
            'class'   =>'summernote'
        ));
        $content->setLabel('Content');
        $this->add($content);

        $active = new Select("active"
        ,array('Y' => $this->di->get('translate')->_('Yes'),'N' => $this->di->get('translate')->_('No'))
        ,array('class' =>'form-control'));
        $active->setLabel('active');
        $this->add($active);



    }

}
