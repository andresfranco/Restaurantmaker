<?php

class CompanyAddress extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $companyid;

    /**
     *
     * @var integer
     */
    protected $addressid;

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
     * Returns the value of field companyid
     *
     * @return integer
     */
    public function getCompanyid()
    {
        return $this->companyid;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('companyid', 'Company', 'id', array('alias' => 'Company'));
        $this->belongsTo('addressid', 'Address', 'id', array('alias' => 'Address'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'company_address';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanyAddress[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanyAddress
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
            'companyid' => 'companyid',
            'addressid' => 'addressid'
        );
    }

}
