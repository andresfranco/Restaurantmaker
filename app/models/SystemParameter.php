<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class SystemParameter extends \Phalcon\Mvc\Model
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
    protected $code;

    /**
     *
     * @var string
     */
    protected $parameter;

    /**
     *
     * @var string
     */
    protected $textvalue;

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
     * Method to set the value of field code
     *
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Method to set the value of field parameter
     *
     * @param string $parameter
     * @return $this
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * Method to set the value of field textvalue
     *
     * @param string $textvalue
     * @return $this
     */
    public function setTextvalue($textvalue)
    {
        $this->textvalue = $textvalue;

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
     * Returns the value of field code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the value of field parameter
     *
     * @return string
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Returns the value of field textvalue
     *
     * @return string
     */
    public function getTextvalue()
    {
        return $this->textvalue;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'system_parameter';
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
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SystemParameter[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SystemParameter
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
            'code' => 'code',
            'parameter' => 'parameter',
            'textvalue' => 'textvalue',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }

    public function validation()
    {
        $this->validate(new PresenceOf(array('field'=>'code')));
        $this->validate(new PresenceOf(array('field'=>'parameter')));
        $this->validate(new PresenceOf(array('field' => 'textvalue')));
        $this->validate(new Uniqueness(array('field' => array('code', 'parameter'))));
        if ($this->validationHasFailed() == true) {return false;}
        return true;
    }
    public function getMessages()
    {
        $messages = array();
        $txtmessage ="";
        foreach (parent::getMessages() as $message) {
            switch ($message->getType())
            {
                case 'PresenceOf':
                    switch ($message->getField()) {
                      case 'code':$txtmessage = $this->di->get('translate')->_('systemparameter.code.required');break;
                      case 'parameter':$txtmessage = $this->di->get('translate')->_('systemparameter.parameter.required');break;
                      case 'textvalue':$txtmessage = $this->di->get('translate')->_('systemparameter.textvalue.required');break;
                    }
                    $messages[] =$txtmessage;break;
                    case 'Unique':

                         if (is_array($message->getField()))
                         {
                           $field =implode("-", $message->getField());
                         }
                         else {
                           $field =$message->getField();
                         }

                         switch ($field) {
                          case 'code-parameter':
                             $txtmessage =$this->di->get('translate')->_('systemparameter.code_parameter.exist');
                          break;
                      }
                      $messages[] =$txtmessage;break;

            }
        }

        return $messages;
    }


}
