<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class Translation extends \Phalcon\Mvc\Model
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
    protected $languagecode;

    /**
     *
     * @var string
     */
    protected $translatekey;

    /**
     *
     * @var string
     */
    protected $value;

    /**
    /**
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
     * Method to set the value of field key
     *
     * @param string $translatekey
     * @return $this
     */
    public function setTranslatekey($translatekey)
    {
        $this->translatekey = $translatekey;

        return $this;
    }

    /**
     * Method to set the value of field value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

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
     * Returns the value of field languagecode
     *
     * @return string
     */
    public function getLanguagecode()
    {
        return $this->languagecode;
    }

    /**
     * Returns the value of field key
     *
     * @return string
     */
    public function getTranslatekey()
    {
        return $this->translatekey;
    }

    /**
     * Returns the value of field value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
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
        $this->belongsTo('languagecode', 'Language', 'code', array('alias' => 'Language'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'translation';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Translation[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Translation
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
            'languagecode' => 'languagecode',
            'translatekey' => 'translatekey',
            'value' => 'value',
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
                  'field'    => 'languagecode'

              )
          )
      );

      $this->validate(
          new PresenceOf(
              array(
                  'field'    => 'translatekey'

              )
          )
      );

        $this->validate(
            new PresenceOf(
                array(
                    'field'    => 'value'

                )
            )
        );

        $this->validate(new Uniqueness(array(
           'field' => array('languagecode', 'translatekey')

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
                    case 'languagecode':
                     $txtmessage = $this->di->get('translate')->_('translation.required.language');
                    break;
                    case 'key':
                     $txtmessage = $this->di->get('translate')->_('translation.required.key');
                    break;
                    case 'value':
                     $txtmessage = $this->di->get('translate')->_('translation.required.value');
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
                    case 'languagecode-translatekey':
                       $txtmessage =$this->di->get('translate')->_('translation.key.exist');
                  break;
                }
                $messages[] =$txtmessage;
               break;
           }
       }

       return $messages;
   }

}
