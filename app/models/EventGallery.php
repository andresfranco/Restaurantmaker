<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Message as Message;
use Phalcon\Mvc\Model\modelsManager;
class EventGallery extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $eventid;

    /**
     *
     * @var integer
     */
    protected $galleryid;

    /**
     *
     * @var string
     */
    protected $createuser;

    /**
     *
     * @var string
     */
    protected $modifyuser;

    /**
     *
     * @var string
     */
    protected $createdate;

    /**
     *
     * @var string
     */
    protected $modifydate;

    /**
     * Method to set the value of field eventid
     *
     * @param integer $eventid
     * @return $this
     */
    public function setEventid($eventid)
    {
        $this->eventid = $eventid;

        return $this;
    }

    /**
     * Method to set the value of field galleryid
     *
     * @param integer $galleryid
     * @return $this
     */
    public function setGalleryid($galleryid)
    {
        $this->galleryid = $galleryid;

        return $this;
    }

    /**
     * Method to set the value of field createuser
     *
     * @param string $createuser
     * @return $this
     */
    public function setCreateuser($createuser)
    {
        $this->createuser = $createuser;

        return $this;
    }

    /**
     * Method to set the value of field modifyuser
     *
     * @param string $modifyuser
     * @return $this
     */
    public function setModifyuser($modifyuser)
    {
        $this->modifyuser = $modifyuser;

        return $this;
    }

    /**
     * Method to set the value of field createdate
     *
     * @param string $createdate
     * @return $this
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;

        return $this;
    }

    /**
     * Method to set the value of field modifydate
     *
     * @param string $modifydate
     * @return $this
     */
    public function setModifydate($modifydate)
    {
        $this->modifydate = $modifydate;

        return $this;
    }

    /**
     * Returns the value of field eventid
     *
     * @return integer
     */
    public function getEventid()
    {
        return $this->eventid;
    }

    /**
     * Returns the value of field galleryid
     *
     * @return integer
     */
    public function getGalleryid()
    {
        return $this->galleryid;
    }

    /**
     * Returns the value of field createuser
     *
     * @return string
     */
    public function getCreateuser()
    {
        return $this->createuser;
    }

    /**
     * Returns the value of field modifyuser
     *
     * @return string
     */
    public function getModifyuser()
    {
        return $this->modifyuser;
    }

    /**
     * Returns the value of field createdate
     *
     * @return string
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * Returns the value of field modifydate
     *
     * @return string
     */
    public function getModifydate()
    {
        return $this->modifydate;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('eventid', 'Event', 'id', array('alias' => 'Event'));
        $this->belongsTo('galleryid', 'Gallery', 'id', array('alias' => 'Gallery'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'event_gallery';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EventGallery[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EventGallery
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
            'eventid' => 'eventid',
            'galleryid' => 'galleryid',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }
     public function validation()
    {
      $this->validate(new PresenceOf(array('field' => 'galleryid' )));
        if ($this->validationHasFailed() == true) {
            return false;
        }

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
                  case 'galleryid':
                   $txtmessage = $this->di->get('translate')->_('event.gallery.required');
                  break;
                 
                 }
                  $messages[] =$txtmessage;
                 break;
              $messages[] =$txtmessage;
             break;
             case 'ConstraintViolation':
            $txtmessage =$this->di->get('translate')->_('eventgallery.constraintviolation');
             $messages[] =$txtmessage;
             break;

            case 'Gallery_exist':
            $txtmessage =$this->di->get('translate')->_('eventgallery.gallery.exist');
             $messages[] =$txtmessage;
             break;
         }
     }

     return $messages;
 }

 public function beforeValidation()
 
 {

   $quantity = $this->validate_gallery();

    if ($quantity >0)
      {  
        $text = "Gallery exist";
        $field = "galleryid";
        $type = "Gallery_exist";
        $message = new Message($text,$field,$type);
        $this->appendMessage($message);
        return false;
      }
        return true;  
 }

 public function validate_gallery()
 {
   
    $event_galleries = $this->modelsManager
    ->executeQuery("SELECT count(*) as quantity FROM EventGallery WHERE eventid = :eventid: AND galleryid =:galleryid:"
    , array('eventid' => $this->getEventid() , 'galleryid'=>$this->getGalleryid()));
    
    $quantity = 0;
    foreach ($event_galleries as $event_gallery) 
    {
       $quantity = $event_gallery->quantity;
    }

    return $quantity;
 }


}


