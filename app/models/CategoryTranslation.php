<?php
use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
class CategoryTranslation extends \Phalcon\Mvc\Model
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
    protected $languagecode;

    /**
     *
     * @var integer
     */
    protected $categoryid;

    /**
     *
     * @var string
     */
    protected $category;

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
     * Method to set the value of field languagecode
     *
     * @param string $languagecode
     * @return $this
     */
    public function setLanguagecode($languagecode)
    {
        $this->languagecode = $languagecode;

        return $this;
    }

    /**
     * Method to set the value of field articleid
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
     * Method to set the value of field category
     *
     * @param string $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category= $category;

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
     * Returns the value of field languagecode
     *
     * @return string
     */
    public function getLanguagecode()
    {
        return $this->languagecode;
    }

    /**
     * Returns the value of field categoryid
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->categoryid;
    }
  
     /**
     * Returns the value of field category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
        $this->belongsTo('categoryid', 'DishCategory', 'id', array('alias' => 'DishCategory'));
        $this->belongsTo('languagecode', 'Language', 'code', array('alias' => 'Language'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'category_translation';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticleTranslation[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticleTranslation
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
            'languagecode' => 'languagecode',
            'categoryid' => 'categoryid',
            'category' => 'category',
            'createuser' => 'createuser',
            'modifyuser' => 'modifyuser',
            'createdate' => 'createdate',
            'modifydate' => 'modifydate'
        );
    }
    public function validation()
    {
       $validator= new Validation();
       $validator->add(["languagecode","category"],
       new PresenceOf(
        [
          "message" =>
          [
            "languagecode" => $this->di->get('translate')->_('category_translation.language.required'),
            "category" => $this->di->get('translate')->_('category_translation.category.required'),
           
           ]
        ]
        ));
    
      $validator->add(["categoryid","languagecode"],new Uniqueness(["model" => $this,"message" => $this->di->get('translate')->_('category_translation.language.exist')]));
      return $this->validate($validator);
    }
  
  
   public static function  getTranslatedCategoryByDish($menuid=0,$languagecode='en')
    {
        // A raw SQL statement
        $sql = "CALL getTranslatedCategoryByDish('$menuid', '$languagecode');";

        // Base model
        $categoryTranslation = new CategoryTranslation();

        // Execute the query
        return new Resultset(
            null,
            $categoryTranslation,
            $categoryTranslation->getReadConnection()->query($sql)
        );
    }



}
