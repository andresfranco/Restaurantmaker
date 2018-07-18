<?php
use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
class User extends Phalcon\Mvc\Model
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
    protected $username;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $password;


    /**
     *
     * @var string
     */
    protected $confirm_password;

    /**
    /**
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
    public function initialize()
    {
         $this->skipAttributesOnCreate(array('confirm_password'));
         $this->skipAttributesOnUpdate(array('confirm_password'));
         $this->hasMany('id', 'UserRole', 'userid', array('alias' => 'UserRole',"foreignKey" => array(
                     "message" => "user.constraintviolation"
                 )));
    }
    /**
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

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
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    /**
     * Method to set the value of field confirm_password
     *
     * @param string $confirm_password
     * @return $this
     */
    public function setConfirm_password($confirm_password)
    {
        $this->confirm_password = $confirm_password;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
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
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field confirm_password
     *
     * @return string
     */
    public function getConfirm_password()
    {
        return $this->confirm_password;
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
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
       $validator= new Validation();
       $validator->add(["username","password", "email"],
       new PresenceOf(
        [
          "message" =>
          [
            "username" => $this->di->get('translate')->_('username.required'),
            "password" => $this->di->get('translate')->_('pass.required'),
            "email" => $this->di->get('translate')->_('email.valid')
           ]
        ]
        ));
      
      $validator->add( "email", new Email([ "message" => $this->di->get('translate')->_('email.valid')]));
      
      $validator->add("username",new Uniqueness(["model"   => $this,"message" => $this->di->get('translate')->_('username.unique')]));
      
    }

   
    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function beforeCreate()
   {
    $this->password =  $this->getDI()->getSecurity()->hash($this->password);
    }

    public function beforeValidationOnCreate(){
        $confirm_data = [
            'password' => $this->getPassword(),
            'confirm_password' => $this->getConfirm_password()
        ];
        $validator = new Phalcon\Validation();
        $validator->add('password', new \Phalcon\Validation\Validator\Confirmation(array(
            'message' => $this->di->get('translate')->_('user.equal.confirm_password'),
            'with' => 'confirm_password'
        )));

        $messages = $validator->validate($confirm_data);
        if (count($messages)) {
            foreach ($messages as $message) {
                $model_message = new Phalcon\Mvc\Model\Message(
                    $message->getMessage(),
                    'password',
                    'confirm_password'
                );
                $this->appendMessage($model_message);
            }
            return false;
        }
        else {
          return true;
        }

    }


}
