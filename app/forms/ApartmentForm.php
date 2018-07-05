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

class ApartmentForm extends Form
{
  public function initialize()
	{
  // Company
  $company = new Select('companyid',Company::find(), array(
    'using' => array('id','name')));
  $company->setLabel('Company');
  $this->add($company);

  $tower = new Select('towerid', array('0' =>  'Select a tower'));
  $tower->setLabel('Tower');
  $this->add($tower);


  $name = new Text('name');
  $name->setLabel('Apartment Name');
  $name->addValidators(array(
			new PresenceOf(array(
				'message' => 'You must enter an apartment name'
			))));

  $this->add($name);
  //añadimos un botón de tipo submit
$submit = $this->add(new Submit('save', array(
  'class' => 'btn btn-success'
)));


  }

}
