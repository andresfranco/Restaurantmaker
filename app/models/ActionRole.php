<?php
use Phalcon\Mvc\Model\Validator\PresenceOf;
class ActionRole extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $actionid;

    /**
     *
     * @var integer
     */
    protected $roleid;

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

    /**
     * Method to set the value of field actionid
     *
     * @param integer $actionid
     * @return $this
     */
    public function setActionid($actionid)
    {
        $this->actionid = $actionid;

        return $this;
    }

    /**
     * Method to set the value of field roleid
     *
     * @param integer $roleid
     * @return $this
     */
    public function setRoleid($roleid)
    {
        $this->roleid = $roleid;

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
     * Returns the value of field actionid
     *
     * @return integer
     */
    public function getActionid()
    {
        return $this->actionid;
    }

    /**
     * Returns the value of field roleid
     *
     * @return integer
     */
    public function getRoleid()
    {
        return $this->roleid;
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
        $this->belongsTo('actionid', 'Action', 'id', array('alias' => 'Action'));
        $this->belongsTo('roleid', 'Role', 'id', array('alias' => 'Role'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'action_role';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ActionRole[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ActionRole
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
            'actionid' => 'actionid',
            'roleid' => 'roleid',
            'createuser'=>'createuser',
            'modifyuser'=>'modifyuser',
            'createdate'=>'createdate',
            'modifydate'=>'modifydate'
        );
    }

    public function validation()
    {
      $this->validate(  new PresenceOf(array('field'=>'actionid' )));

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
                  case 'actionid':
                   $txtmessage = $this->di->get('translate')->_('actionrole.actionid.required');
                  break;
                 }
                  $messages[] =$txtmessage;
                 break;

          }
     }

     return $messages;
 }

}
