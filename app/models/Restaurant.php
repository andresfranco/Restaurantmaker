<?php
use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class Restaurant extends \Phalcon\Mvc\Model
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
     *
     * @var string
     */
    protected $phone;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $logo_path;

    /**
     /**
     *
     * @var string
     */
    protected $main_image;

    /**
     /**
     *
     * @var string
     */
    protected $main_image_title;

    /**
     /**
     *
     * @var string
     */
    protected $favicon;

    /**
     *
     * @var string
     */
    protected $website;

    /**
     *
     * @var integer
     */
    protected $addressid;

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
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field logo_path
     *
     * @param string $logo_path
     * @return $this
     */
    public function setLogoPath($logo_path)
    {
        $this->logo_path = $logo_path;

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
     * Method to set the value of field main_image_title
     *
     * @param string $main_image_title
     * @return $this
     */
    public function setMainImageTitle($main_image_title)
    {
        $this->main_image_title = $main_image_title;

        return $this;
    }
  
   /**
     * Method to set the value of field pavicon
     *
     * @param string $favicon
     * @return $this
     */
    public function setFavicon($favicon)
    {
        $this->favicon = $favicon;

        return $this;
    }

    /**
     * Method to set the value of field website
     *
     * @param string $website
     * @return $this
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Method to set the value of field addressid
     *
     * @param integer $addressid
     * @return $this
     */
    public function setAddressid($addressid)
    {
        $this->addressid = $addressid;

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
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field logo_path
     *
     * @return string
     */
    public function getLogoPath()
    {
        return $this->logo_path;
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
     * Returns the value of field main_image_title
     *
     * @param string $main_image_title
     * @return $this
     */
    public function getMainImageTitle()
    {
        return $this->main_image_title; 
    }
  
   /**
     *Returns the value of field pavicon
     *
     * @param string $favicon
     * @return $this
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

    /**
     * Returns the value of field website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Returns the value of field addressid
     *
     * @return integer
     */
    public function getAddressid()
    {
        return $this->addressid;
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
       * Validations and business logic
       *
       * @return boolean
       */
       public function validation()
       {
          
         
        $validator= new Validation();
        $validator->add(["name","phone", "email","addressid"],
        new PresenceOf(
        [
          "message" =>
          [
            "name" => $this->di->get('translate')->_('restaurant.name.required'),
            "phone" => $this->di->get('translate')->_('restaurant.phone.required'),
            "email" => $this->di->get('translate')->_('restaurant.email.required'),
            "addressid" => $this->di->get('translate')->_('restaurant.address.required')
           ]
        ]
        ));
      
      $validator->add( "email", new Email([ "message" => $this->di->get('translate')->_('email.valid')]));
      
      return $this->validate($validator);
         
       }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Menu', 'restaurantid', array('alias' => 'Menu'));
        $this->belongsTo('addressid', 'Address', 'id', array('alias' => 'Address'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'restaurant';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Restaurant[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Restaurant
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
            'phone' => 'phone',
            'email' => 'email',
            'logo_path' => 'logo_path',
            'main_image'=>'main_image',
            'main_image_title'=>'main_image_title',
            'favicon'=>'favicon',
            'website' => 'website',
            'addressid' => 'addressid',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }


}
