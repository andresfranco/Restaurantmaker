<?php
use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
class RestaurantTranslation extends \Phalcon\Mvc\Model
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
    protected $restaurantId;
  
     
    /**
     *
     * @var integer
     */
    protected $languagecode;

    /**
     *
     * @var integer
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $image_title;

 
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
     * Method to set the value of field restaurantId
     *
     * @param integer $restaurantId
     * @return $this
     */
    public function setRestaurantId($restaurantId)
    {
        $this->restaurantId = $restaurantId;

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
     * @param integer $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field image_title
     *
     * @param string $image_title
     * @return $this
     */
    public function setImageTitle($image_title)
    {
        $this->image_title = $image_title;

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
     * Returns the value of field restaurantId
     *
     * @return integer
     */
    public function getRestaurantId()
    {
        return $this->restaurantId;
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
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field image_title
     *
     * @return string
     */
    public function getImageTitle()
    {
        return $this->image_title;
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
        $this->belongsTo('restaurantId', 'Restaurant', 'id', array('alias' => 'Restaurant'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'restaurant_translation';
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
            'restaurantId' => 'restaurantId',
            'languagecode' => 'languagecode',
            'name' => 'name',
            'image_title' => 'image_title',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }

    public function validation()
    {
       $validator= new Validation();
       $validator->add(["languagecode","name", "description"],
       new PresenceOf(
        [
          "message" =>
          [
            "languagecode" => $this->di->get('translate')->_('language.required'),
            "name" => $this->di->get('translate')->_('name.required'),
            "image_title" => $this->di->get('translate')->_('restaurant.imagetitle.required')
           ]
        ]
        ));
      
      $validator->add(["restaurantId","languagecode"],new Uniqueness(["model" => $this,"message" => $this->di->get('translate')->_('restaurant_translation.language.exist')]));
      return $this->validate($validator);
    }

   
}
