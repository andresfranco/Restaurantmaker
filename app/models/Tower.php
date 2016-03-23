<?php

class Tower extends \Phalcon\Mvc\Model
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
    protected $companyid;

    /**
     *
     * @var string
     */
    protected $number;

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
     * Method to set the value of field companyid
     *
     * @param integer $companyid
     * @return $this
     */
    public function setCompanyid($companyid)
    {
        $this->companyid = $companyid;

        return $this;
    }

    /**
     * Method to set the value of field number
     *
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

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
     * Returns the value of field companyid
     *
     * @return integer
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }

    /**
     * Returns the value of field number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Apartment', 'towerid', array('alias' => 'Apartment'));
        $this->belongsTo('companyid', 'Company', 'id', array('alias' => 'Company'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tower';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tower[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tower
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
            'companyid' => 'companyid',
            'number' => 'number'
        );
    }

}
