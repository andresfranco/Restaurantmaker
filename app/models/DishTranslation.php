<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class DishTranslation extends \Phalcon\Mvc\Model
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
    protected $dishid;

    /**
     *
     * @var string
     */
    protected $languagecode;

    /**
     *
     * @var string
     */
    protected $name;

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
     * Method to set the value of field dishid
     *
     * @param integer $dishid
     * @return $this
     */
    public function setDishid($dishid)
    {
        $this->dishid = $dishid;

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
     * Returns the value of field dishid
     *
     * @return integer
     */
    public function getDishid()
    {
        return $this->dishid;
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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
        $this->belongsTo('languagecode', 'Language', 'code', array('alias' => 'Language'));
        $this->belongsTo('dishid', 'Dish', 'id', array('alias' => 'Dish'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'dish_translation';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DishTranslation[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DishTranslation
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
            'dishid' => 'dishid',
            'languagecode' => 'languagecode',
            'name' => 'name',
            'description' => 'description',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }

    public function validation()
    {
      $this->validate(new PresenceOf(array('field' => 'languagecode')));
      $this->validate(new PresenceOf(array('field' => 'name' )));
      $this->validate(new PresenceOf(array('field' => 'description')));
      $this->validate(new Uniqueness(array('field' => array('dishid','languagecode'))));


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
                   $txtmessage = $this->di->get('translate')->_('dish_translation.language.required');
                  break;
                  case 'name':
                   $txtmessage = $this->di->get('translate')->_('dish_translation.name.required');
                  break;
                  case 'description':
                   $txtmessage = $this->di->get('translate')->_('dish_translation.description.required');
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
                  case 'dishid-languagecode':
                     $txtmessage =$this->di->get('translate')->_('dish_translation.language.exist');
                break;
              }
              $messages[] =$txtmessage;
             break;
         }
     }

     return $messages;
 }

}
