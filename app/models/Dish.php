<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\Numericality;
class Dish extends \Phalcon\Mvc\Model
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
    protected $menuid;

    /**
     *
     * @var integer
     */
    protected $categoryid;

    /**
     *
     * @var integer
     */
    protected $galleryid;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var double
     */
    protected $price;

    /**
     *
     * @var string
     */
    protected $image_path;

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
     * Method to set the value of field menuid
     *
     * @param integer $menuid
     * @return $this
     */
    public function setMenuid($menuid)
    {
        $this->menuid = $menuid;

        return $this;
    }

    /**
     * Method to set the value of field categoryid
     *
     * @param integer $categoryid
     * @return $this
     */
    public function setCategoryid($categoryid)
    {
        $this->categoryid = $categoryid;

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
     * Method to set the value of field price
     *
     * @param double $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Method to set the value of field image_path
     *
     * @param string $image_path
     * @return $this
     */
    public function setImagePath($image_path)
    {
        $this->image_path = $image_path;

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
     * Returns the value of field menuid
     *
     * @return integer
     */
    public function getMenuid()
    {
        return $this->menuid;
    }

    /**
     * Returns the value of field categoryid
     *
     * @return integer
     */
    public function getCategoryid()
    {
        return $this->categoryid;
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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the value of field image_path
     *
     * @return string
     */
    public function getImagePath()
    {
        return $this->image_path;
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
        $this->hasMany('id', 'DishTranslation', 'dishid', array('alias' => 'DishTranslation'));
        $this->belongsTo('categoryid', 'DishCategory', 'id', array('alias' => 'DishCategory'));
        $this->belongsTo('menuid', 'Menu', 'id', array('alias' => 'Menu'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'dish';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Dish[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Dish
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
            'menuid' => 'menuid',
            'categoryid' => 'categoryid',
            'galleryid' => 'galleryid',
            'name' => 'name',
            'price' => 'price',
            'image_path' => 'image_path',
            'description' => 'description',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }

    public function validation()
    {

      $this->validate(new PresenceOf(array('field' => 'categoryid')));
      $this->validate(new PresenceOf(array('field' => 'name')));
      $this->validate(new PresenceOf(array('field' => 'price')));
      $this->validate(new Uniqueness(array('field' => array('menuid', 'categoryid','name'))));

      if ($this->validationHasFailed() == true) {return false;}
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
                  case 'categoryid':$txtmessage = $this->di->get('translate')->_('dish.category.required');break;
                  case 'name':$txtmessage = $this->di->get('translate')->_('dish.name.required');break;
                  case 'price':$txtmessage = $this->di->get('translate')->_('dish.price.required');break;
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
                  case 'menuid-categoryid-name':
                     $txtmessage =$this->di->get('translate')->_('dish.exist');
                break;
              }
              $messages[] =$txtmessage;
             break;
         }
     }

     return $messages;
 }

}
