<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

class LanguageForm extends Form
{
  public function initialize($entity =null , $options=null)
	{


  $code = new Text('code');
  $code->setLabel('Código');
  $this->add($code);

  $language = new Text('language');
  $language->setLabel('Idioma');
  $this->add($language);

  $language = new Text('language');
  $language->setLabel('Idioma');
  $this->add($language);


  $flag =  new Select(
        "flag",
        $this->get_country_flags(),
        array("useEmpty" => true,
        "emptyText" => $this->di->get('translate')->_('Seleccione una bandera'))

    );
  $flag->setLabel('Bandera');
  $this->add($flag);

}
public function get_country_flags()
{
  $files = glob('metronic/assets/global/img/flags/*.{png}', GLOB_BRACE);

  $countries = Country::find(array(
        "order" => "country asc"
    ))->toArray();

     foreach($countries as $country)
     {
       foreach($files as $file) {
       if(strtoupper($country['code']) == strtoupper(basename($file,".png")))
       {
       $flags[strtolower($country['code']).'.png']=	basename($this->di->get('translate')->_($country['country']));

       }
     }

    }
    // Order Array By Translate Value
    asort($flags);


    return $flags;

}

}
