<?php
use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class ArticleComment extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $articleid;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $comment;

    /**
     *
     * @var string
     */
    protected $active;


    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field articleid
     *
     * @param integer $articleid
     * @return $this
     */
    public function setArticleid($articleid)
    {
        $this->articleid = $articleid;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field comment
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Method to set the value of field active
     *
     * @param string $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }


    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field articleid
     *
     * @return integer
     */
    public function getArticleid()
    {
        return $this->articleid;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }



    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('articleid', 'Article', 'id', array('alias' => 'Article'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'article_comment';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticleComment[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticleComment
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'id' => 'id',
            'articleid' => 'articleid',
            'name' => 'name',
            'email' => 'email',
            'comment' => 'comment',
            'active' => 'active'
        );
    }

    public function validation()
    {
        $this->validate(new PresenceOf(array('field'=>'name')));
        $this->validate(new PresenceOf(array('field'=>'email')));
        $this->validate(new PresenceOf(array('field'=>'comment')));
        $this->validate(new Email(array('field'=>'email')));

        if ($this->validationHasFailed() == true) {return false;}
        return true;
    }

    public function getMessages()
    {
        $messages = array();
        $txtmessage ="";
        foreach (parent::getMessages() as $message) {
            switch ($message->getType())
            {
                case 'PresenceOf':
                    switch ($message->getField()) {
                        case 'name':$txtmessage = $this->di->get('translate')->_('article_comment.name.required');break;
                        case 'email':$txtmessage = $this->di->get('translate')->_('article_comment.email.required');break;
                        case 'comment':$txtmessage = $this->di->get('translate')->_('article_comment.comment.required');break;
                    }
                    $messages[] =$txtmessage;break;
                case 'Email':
                    switch ($message->getField()) {
                        case 'email':
                            $txtmessage =$this->di->get('translate')->_('article_comment.email.exist');
                            break;
                    }
                    $messages[] =$txtmessage;break;
            }
        }

        return $messages;
    }

}
