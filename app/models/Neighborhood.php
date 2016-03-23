<?php
use Phalcon\Mvc\Model\Validator;
use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class Neighborhood extends \Phalcon\Mvc\Model
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
    protected $neighborhood;

    /**
     *
     * @var integer
     */
    protected $townshipid;

    /**
     *
     * @var integer
     */
    protected $cityid;

    /**
     *
     * @var string
     */
    protected $createuser;

    /**
    /**
     *
     * @var string
     */
    protected $modifyuser;

    /**
    /**
     *
     * @var datetime
     */
    protected $createdate;

    /**
    /**
     *
     * @var datetime
     */
    protected $modifydate;

    /**


    /**


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
     * Method to set the value of field neighborhood
     *
     * @param string $neighborhood
     * @return $this
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * Method to set the value of field townshipid
     *
     * @param integer $townshipid
     * @return $this
     */
    public function setTownshipid($townshipid)
    {
        $this->townshipid = $townshipid;

        return $this;
    }

    /**
     * Method to set the value of field cityid
     *
     * @param integer $cityid
     * @return $this
     */
    public function setCityid($cityid)
    {
        $this->cityid = $cityid;

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
     * @param datetime $createdate
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
     * @param datetime $modifydate
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
     * Returns the value of field neighborhood
     *
     * @return string
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * Returns the value of field townshipid
     *
     * @return integer
     */
    public function getTownshipid()
    {
        return $this->townshipid;
    }

    /**
     * Returns the value of field cityid
     *
     * @return integer
     */
    public function getCityid()
    {
        return $this->cityid;
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
     * @return datetime
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }
    /**
     * Returns the value of field modifydate
     *
     * @return datetime
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
        $this->hasMany('id', 'Address', 'neighborhoodid', array('alias' => 'Address',"foreignKey" => array(
                    "message" => "neighborhood.constraintviolation"
                )));
        $this->belongsTo('cityid', 'City', 'id', array('alias' => 'City'));
        $this->belongsTo('townshipid', 'Township', 'id', array('alias' => 'Township'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'neighborhood';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Neighborhood[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Neighborhood
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
            'neighborhood' => 'neighborhood',
            'townshipid' => 'townshipid',
            'cityid' => 'cityid',
            'createuser'=>'createuser',
            'modifyuser'=>'modifyuser',
            'createdate'=>'createdate',
            'modifydate'=>'modifydate'
        );
    }
    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
      $this->validate(
          new PresenceOf(
              array(
                  'field'    => 'cityid'

              )
          )
      );
      $this->validate(
          new PresenceOf(
              array(
                  'field'    => 'townshipid'

              )
          )
      );
      $this->validate(
          new PresenceOf(
              array(
                  'field'    => 'neighborhood'

              )
          )
      );
      $this->validate(new Uniqueness(array(
         'field' => array('townshipid', 'neighborhood')


     )));

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

           switch ($message->getType()) {
               case 'PresenceOf':
                   switch ($message->getField()) {
                    case 'cityid':
                     $txtmessage = $this->di->get('translate')->_('city.select.required');
                    break;
                    case 'townshipid':
                     $txtmessage = $this->di->get('translate')->_('neighborhood.township.required');
                    break;
                    case 'neighborhood':
                     $txtmessage = $this->di->get('translate')->_('neighborhood.required');
                    break;
                   }
                    $messages[] =$txtmessage;
                   break;
              case 'Unique':

              if (is_array($message->getField()))
              {
                $field =implode("-", $message->getField());
              }
              else {
                $field =$message->getField();
              }

              switch ($field) {
               case 'townshipid-neighborhood':
                  $txtmessage =$this->di->get('translate')->_('neighborhood.township.exist');
             break;
           }
           $messages[] =$txtmessage;
          break;
          case 'ConstraintViolation':
              $txtmessage =$this->di->get('translate')->_('neighborhood.constraintviolation');
              $messages[] =$txtmessage;
              break;
       }

       return $messages;
   }
 }

}
