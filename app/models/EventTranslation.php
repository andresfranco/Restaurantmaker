<?php
use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Mvc\Model\Message as Message;
class EventTranslation extends \Phalcon\Mvc\Model
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
    protected $eventid;
  
    /**
     *
     * @var string
     */
    protected $languagecode;


    /**
     *
     * @var string
     */
    protected $name_translation;

    /**
     *
     * @var string
     */
    protected $location;

    /**
     *
     * @var string
     */
    protected $description;

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
     * Method to set the value of field eventid
     *
     * @param integer $eventid
     * @return $this
     */
    public function setEventId($eventid)
    {
        $this->eventid= $eventid;

        return $this;
    }
  
     /**
     * Method to set the value of field languagecode
     *
     * @param string $languagecode
     * @return $this
     */
    public function setLanguagecode($languagecode)
    {
        $this->languagecode = $languagecode;

        return $this;
    }

    /**
     * Method to set the value of field $name_translation
     *
     * @param string $name_translation
     * @return $this
     */
    public function setNameTranslation($name)
    {
        $this->name_translation = $name_translation;

        return $this;
    }

    /**
     * Method to set the value of field location
     *
     * @param string $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

   
    /**
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
  
    /**
     * Returns the value of field eventid
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->eventid;
    }
    
    /**
     * Returns the value of field languagecode
     *
     * @return string
     */
    public function getLanguagecode()
    {
        return $this->languagecode;
    }

    /**
     * Returns the value of field name_translation
     *
     * @return string
     */
    public function getNameTranslation()
    {
        return $this->name_translation;
    }

    /**
     * Returns the value of field location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }


    /**
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
       $this->belongsTo('languagecode', 'Language', 'code', array('alias' => 'Language'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'event_translation';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Event[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Event
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
            'eventid'=>'eventid',
            'languagecode'=>'languagecode',
            'name' => 'name_translation',
            'location' => 'location',
            'description' => 'description',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }

    public function validation()
    {
     
       $validator= new Validation();
       $validator->add(["name_translation","location","description"],
       new PresenceOf(
        [
          "message" =>
          [
            "name_translation" => $this->di->get('translate')->_('event.name.required'),
            "location" => $this->di->get('translate')->_('event.location.required'),
            "description" => $this->di->get('translate')->_('event.description.required')
           ]
        ]
        ));
        
      $validator->add(["eventid","languagecode"],new Uniqueness(["model" => $this,"message" => $this->di->get('translate')->_('event_translation.language.exist')]));
      return $this->validate($validator);
    }

   

}
