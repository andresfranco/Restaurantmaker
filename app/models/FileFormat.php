<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class FileFormat extends \Phalcon\Mvc\Model
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
    protected $extension;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var string
     */
    protected $accept;

    /**
     *
     * @var string
     */
    protected $mimetype;

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
     * Method to set the value of field extension
     *
     * @param string $extension
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field accept
     *
     * @param string $accept
     * @return $this
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;

        return $this;
    }

    /**
     * Method to set the value of field mimetype
     *
     * @param string $mimetype
     * @return $this
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;

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
     * Returns the value of field extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field accept
     *
     * @return string
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * Returns the value of field mimetype
     *
     * @return string
     */
    public function getMimetype()
    {
        return $this->mimetype;
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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'file_format';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return FileFormat[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return FileFormat
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
            'extension' => 'extension',
            'type' => 'type',
            'accept' => 'accept',
            'mimetype' => 'mimetype',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }

    public function beforeValidationOnCreate()
   {
     $this->validate(new Uniqueness(array('field' => array('extension'))));
     
   }
    public function validation()
    {
        $this->validate(new PresenceOf(array('field'=>'extension')));

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
                      case 'extension':$txtmessage = $this->di->get('translate')->_('fileformat.extension.required');break;
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
                          case 'extension':
                             $txtmessage =$this->di->get('translate')->_('fileformat.extension.exist');
                          break;
                      }
                      $messages[] =$txtmessage;break;

            }
        }

        return $messages;
    }


}
