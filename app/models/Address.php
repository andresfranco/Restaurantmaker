<?php
use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
class Address extends \Phalcon\Mvc\Model
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
    protected $countryid;

    /**
     *
     * @var integer
     */
    protected $stateid;

    /**
     *
     * @var integer
     */
    protected $cityid;

    /**
     *
     * @var integer
     */
    protected $townshipid;

    /**
     *
     * @var integer
     */
    protected $neighborhoodid;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var string
     */
    protected $address;

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
     *
     * @var string
     */
    protected $idtemp;

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
     * Method to set the value of field neighborhoodid
     *
     * @param integer $neighborhoodid
     * @return $this
     */
    public function setNeighborhoodid($neighborhoodid)
    {
        $this->neighborhoodid = $neighborhoodid;

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
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Method to set the value of field idtemp
     *
     * @param string $idtemp
     * @return $this
     */
    public function setIdtemp($idtemp)
    {
        $this->idtemp = $idtemp;

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
     * Returns the value of field cityid
     *
     * @return integer
     */
    public function getCityid()
    {
        return $this->cityid;
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
     * Returns the value of field neighborhoodid
     *
     * @return integer
     */
    public function getNeighborhoodid()
    {
        return $this->neighborhoodid;
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
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
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
     * Returns the value of field modifydate
     *
     * @return string
     */
    public function getIdtemp()
    {
        return $this->idtemp;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'CompanyAddress', 'addressid', array('alias' => 'CompanyAddress',"foreignKey" => array(
                    "message" => "address.constraintviolation"
                )));
        $this->belongsTo('cityid', 'City', 'id', array('alias' => 'City'));
        $this->belongsTo('countryid', 'Country', 'id', array('alias' => 'Country'));
        $this->belongsTo('neighborhoodid', 'Neighborhood', 'id', array('alias' => 'Neighborhood'));
        $this->belongsTo('stateid', 'State', 'id', array('alias' => 'State'));
        $this->belongsTo('townshipid', 'Township', 'id', array('alias' => 'Township'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Address[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Address
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
            'countryid' => 'countryid',
            'cityid' => 'cityid',
            'townshipid' => 'townshipid',
            'neighborhoodid' => 'neighborhoodid',
            'stateid' => 'stateid',
            'description' => 'description',
            'address' => 'address',
            'createuser'=>'createuser',
            'modifyuser'=>'modifyuser',
            'createdate'=>'createdate',
            'modifydate'=>'modifydate'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'address';
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
    
      $validator= new Validation();
      
      $validator->add( "countryid", new PresenceOf([ "message" => $this->di->get('translate')->_('address.country.required')]));
      
      $validator->add( "stateid", new PresenceOf([ "message" => $this->di->get('translate')->_('address.state.required')]));

      $validator->add( "cityid", new PresenceOf([ "message" => $this->di->get('translate')->_('address.city.required')]));
       
      $validator->add( "neighborhoodid", new PresenceOf([ "message" => $this->di->get('translate')->_('address.neighborhood.required')]));
      
      $validator->add( "address", new PresenceOf([ "message" => $this->di->get('translate')->_('address.required')]));
      
      $validator->add(["countryid", "stateid","cityid","townshipid","neighborhoodid","address"],new Uniqueness(["model"   => $this,"message" => $this->di->get('translate')->_('complete_address.exist')]));
      
      return $this->validate($validator);
    }
   

   public function afterSave()
    {
      $this->idtemp = $this->id;
    }


}
