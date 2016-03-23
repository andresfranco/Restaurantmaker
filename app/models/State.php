<?php
use Phalcon\Mvc\Model\Validator;
use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class State extends \Phalcon\Mvc\Model
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
    protected $state;

    /**
     *
     * @var integer
     */
    protected $countryid;

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
     * Method to set the value of field state
     *
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

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
     * Returns the value of field state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
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
        $this->hasMany('id', 'Address', 'stateid', array('alias' => 'Address'));
        $this->hasMany('id', 'City', 'stateid',
                array('alias' => 'City'
                    ,"foreignKey" => array(
                    "message" => "No se Puede eliminar,Existe una ciudad que tien ese estado asociado"
                )
                    ));
        $this->belongsTo('countryid', 'Country', 'id', array('alias' => 'Country'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'state';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return State[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return State
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
            'state' => 'state',
            'countryid' => 'countryid',
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
                  'field'    => 'state'

              )
          )
      );

      $this->validate(new Uniqueness(array(
         'field' => array('countryid', 'state')
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
                     $txtmessage = $this->di->get('translate')->_('state.country.required');
                    break;
                    case 'state':
                     $txtmessage = $this->di->get('translate')->_('state.required');
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

                switch ($field)
                {
                 case 'countryid-state':
                    $txtmessage =$this->di->get('translate')->_('state.country.state.exist');
                 break;
                 }
                $messages[] =$txtmessage;
               break;
              case 'ConstraintViolation':
               $txtmessage =$this->di->get('translate')->_('state.constraintviolation');
               $messages[] =$txtmessage;
               break;

           }
       }

       return $messages;
   }



}
