<?php
use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Mvc\Model\Message as Message;
class Event extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name;
  
    /**
     /**
     *
     * @var string
     */
    protected $main_image;


    /**
     *
     * @var string
     */
    protected $location;
  
    /**
     *
     * @var string
     */
    protected $active;
  
    
     /**
     *
     * @var string
     */
    protected $main_event;


    /**
     *
     * @var string
     */
    protected $start_date;

    /**
     *
     * @var string
     */
    protected $finish_date;

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
     * Method to set the value of field main_image
     *
     * @param string $main_image
     * @return $this
     */
    public function setMainImage($main_image)
    {
        $this->main_image = $main_image;

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
     * Method to set the value of field main_event
     *
     * @param string $main_event
     * @return $this
     */
    public function setMainEvent($main_event)
    {
        $this->main_event = $main_event;

        return $this;
    }

    /**
     * Method to set the value of field start_date
     *
     * @param string $start_date
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Method to set the value of field finish_date
     *
     * @param string $finish_date
     * @return $this
     */
    public function setFinishDate($finish_date)
    {
        $this->finish_date = $finish_date;

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
     
     /**
     * Returns the value of field main_image
     *
     * @param string $main_image
     * @return $this
     */
    public function getMainImage()
    {
        return $this->main_image;
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
     * Returns the value of field active
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }
  
        
   /**
     * Returns the value of field main_event
     *
     * @return string
     */
    public function getMainEvent()
    {
        return $this->main_event;
    }

    /**
     * Returns the value of field start_date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Returns the value of field finish_date
     *
     * @return string
     */
    public function getFinishDate()
    {
        return $this->finish_date;
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
        $this->hasMany('id', 'EventGallery', 'eventid', array('alias' => 'EventGallery'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'event';
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
            'name' => 'name',
            'main_image'=>'main_image',
            'location' => 'location',
            'active' => 'active',
            'main_event'=>'main_event',
            'start_date' => 'start_date',
            'finish_date' => 'finish_date',
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
       $validator->add(["name","start_date","finish_date"],
       new PresenceOf(
        [
          "message" =>
          [
            "name" => $this->di->get('translate')->_('event.name.required'),
            "start_date" => $this->di->get('translate')->_('event.start_date.required'),
            "finish_date" => $this->di->get('translate')->_('event.finish_date.required')
           ]
        ]
        ));
        
      $validator->add("name",new Uniqueness(["model"   => $this,"message" => $this->di->get('translate')->_('event.exist')]));
      return $this->validate($validator);
    }

   

   
  public function beforeValidation()
 
 {

    $start_date = $this->getStartDate();
    $finish_date=$this->getFinishDate();

    if ($start_date>$finish_date)
      {  
        $text = "Date Error";
        $field = "start_date";
        $type = "Invalid_Dates";
        $message = new Message($text,$field,$type);
        $this->appendMessage($message);
        return false;
      }
        return true;  
 }

}
