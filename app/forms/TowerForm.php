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

class TowerForm extends Form
{
  public function initialize()
	{
  // Company
  $company = new Select('companyid',Company::find(), array(
    'using' => array('id','name')));
  $company->setLabel('Empresa');
  $this->add($company);

  $number = new Text('name');
  $number->setLabel('Número de Torre');
  $number->addValidators(array(
			new PresenceOf(array(
				'message' => 'Debe ingresar un numero de torre'
			))));

  $this->add($number);
  //añadimos un botón de tipo submit
$submit = $this->add(new Submit('save', array(
  'class' => 'btn btn-success'
)));


  }

}
