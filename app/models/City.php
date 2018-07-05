<?php
use Phalcon\Mvc\Model\Validator;
use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;


class City extends \Phalcon\Mvc\Model
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
    protected $city;

    /**
     *
     * @var integer
     */
    protected $countryid;

    /**
     *
     * @var integer
     */
    protected $stateid;

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
     * Method to set the value of field city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Method to set the value of field countryid
     *
     * @param integer $countryid
     * @return $this
     */
    public function setCountryid($countryid)
    {
        $this->countryid = $countryid;

        return $this;
    }

    /**
     * Method to set the value of field stateid
     *
     * @param integer $stateid
     * @return $this
     */
    public function setStateid($stateid)
    {
        $this->stateid = $stateid;

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
     * Returns the value of field city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field countryid
     *
     * @return integer
     */
    public function getCountryid()
    {
        return $this->countryid;
    }

    /**
     * Returns the value of field stateid
     *
     * @return integer
     */
    public function getStateid()
    {
        return $this->stateid;
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
        $this->hasMany('id', 'Address', 'cityid', array('alias' => 'Address',"foreignKey" => array(
                    "message" => "city.constraintviolation"
                )));
        $this->hasMany('id', 'Neighborhood', 'cityid', array('alias' => 'Neighborhood',"foreignKey" => array(
                    "message" => "No se Puede eliminar,existe un barrio que tiene esta ciudad asociada"
                )));
        $this->hasMany('id', 'Township', 'cityid', array('alias' => 'Township',"foreignKey" => array(
                    "message" => "No se Puede eliminar,existe un sector que tiene esta ciudad asociado"
                )));
        $this->belongsTo('countryid', 'Country', 'id', array('alias' => 'Country'));
        $this->belongsTo('stateid', 'State', 'id', array('alias' => 'State'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'city';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return City[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return City
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
            'city' => 'city',
            'countryid' => 'countryid',
            'stateid' => 'stateid',
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
                  'field'    => 'countryid'

              )
          )
      );
      $this->validate(
          new PresenceOf(
              array(
                  'field'    => 'stateid'

              )
          )
      );
      $this->validate(
          new PresenceOf(
              array(
                  'field'    => 'city'
              )
          )
      );

      $this->validate(new Uniqueness(array(
         'field' => array('countryid', 'stateid','city')


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
                    case 'countryid':
                     $txtmessage = $this->di->get('translate')->_('city.country.required');
                    break;
                    case 'stateid':
                     $txtmessage = $this->di->get('translate')->_('city.state.required');
                    break;
                    case 'city':
                     $txtmessage = $this->di->get('translate')->_('city.required');
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
                    case 'countryid-stateid-city':
                       $txtmessage =$this->di->get('translate')->_('city.country.city.exist');
                  break;
                }
                $messages[] =$txtmessage;
               break;
               case 'ConstraintViolation':
               $txtmessage =$this->di->get('translate')->_('city.constraintviolation');
               $messages[] =$txtmessage;
               break;
           }
       }

       return $messages;
   }




}
