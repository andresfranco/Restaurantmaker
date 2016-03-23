<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

class ArticleCommentForm extends Form
{
    public function initialize($entity =null , $options=null)
    {

      $article = new Select('articleid',Article::find(), array(
       'using' => array('id','title')
       ,'useEmpty' => TRUE,'emptyText' => $this->di->get('translate')->_('Select an Article')
        ,'class'=>'form-control'));
       $article->setLabel('Article');
       $this->add($article);

        $name = new Text('name',array(
        'class'   =>'form-control'
        ));
        $name->setLabel('Name');
        $this->add($name);

        $email = new Text('email',array(
            'class'   =>'form-control'
        ));
        $email->setLabel('Email');
        $this->add($email);

        $comment = new TextArea('comment',array(
            'id' =>'summernote'
             ,'name'=>'comment',
            'class'   =>'summernote'
        ));
        $comment->setLabel('Comment');
        $this->add($comment);

        $active = new Select("active"
        ,array('Y' => $this->di->get('translate')->_('Yes'),'N' => $this->di->get('translate')->_('No'))
        ,array('class' =>'form-control'));
        $active->setLabel('active');
        $this->add($active);



    }

}
