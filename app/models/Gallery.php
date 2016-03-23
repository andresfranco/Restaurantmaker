<?php
use ControllerBase as ControllerBase;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Uniqueness;
class Gallery extends \Phalcon\Mvc\Model
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
    protected $title;

    /**
     *
     * @var string
     */
    protected $type;

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

    protected $base_obj;

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
     * Method to set the value of field title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
        $this->hasMany('id', 'GalleryImage', 'galleryid', array('alias' => 'GalleryImage'));
        $this->base_obj =new ControllerBase();

    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'gallery';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Gallery[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Gallery
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
            'title' => 'title',
            'type' => 'type',
            'description' => 'description',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }

    public function afterCreate()
    {

        mkdir($this->set_gallery_dir($this->base_obj),0777);
    }

    public function set_gallery_dir($base)
    {

        $dir = $base->get_upload_files_path()."galleries".SEP.$this->name."_gallery";
        return $dir;
    }

    public function afterDelete()
    {
        $base = new ControllerBase();
       $dir =$this->set_gallery_dir($base);
        $base->Delete_folder_content($dir);
    }

    public function beforeSave()
    {
        $base = new ControllerBase();
        $new_name =$base->get_upload_files_path()."galleries".SEP.$this->name."_gallery";
        $old_name =$base->get_upload_files_path()."galleries".SEP.$this->get_old_name()."_gallery";
        if($new_name !=$old_name ) {rename($old_name, $new_name);}
    }

    public function get_old_name()
    {
      $galleries = Gallery::findFirst($this->id);
      $old_name = $galleries->name;
      return $old_name;

    }
    public function validation()
    {
        $this->validate(new PresenceOf(array('field'=>'name')));
        $this->validate(new PresenceOf(array('field'=>'title')));
        $this->validate(new Uniqueness(array('field' => 'name')));
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
                      case 'name':$txtmessage = $this->di->get('translate')->_('gallery.name.required');break;
                      case 'title':$txtmessage = $this->di->get('translate')->_('gallery.title.required');break;
                    }
                    $messages[] =$txtmessage;break;

                case 'Unique':

                    if (is_array($message->getField())) {$field =implode("-", $message->getField());}
                    else {$field =$message->getField();}

                    switch ($field)
                    {
                    case 'name':$txtmessage =$this->di->get('translate')->_('gallery.name.exist');break;
                    }
                    $messages[] =$txtmessage;break;

            }
        }

        return $messages;
    }






}
