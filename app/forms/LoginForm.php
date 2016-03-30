<?php

use Phalcon\Forms\Form;
use	Phalcon\Forms\Element\Text;
use	Phalcon\Forms\Element\Password;
use	Phalcon\Forms\Element\Submit;
use	Phalcon\Forms\Element\Hidden;
use	Phalcon\Validation\Validator\PresenceOf;
use	Phalcon\Validation\Validator\Identical;


class LoginForm extends Form
{

	public function initialize()
	{
		//añadimos el campo username
		$username = new Text('username');

		//añadimos la validación para un campo de tipo username y como campo requerido
		$username->addValidators(array(
			new PresenceOf(array(
				'message' => $this->di->get('translate')->_('El username es requerido')
			))

		));

		//label para el username
		$username->setLabel($this->di->get('translate')->_('Username'));

		//hacemos que se pueda llamar a nuestro campo username
		$this->add($username);

		//añadimos el campo password
		$password = new Password('password');

		//añadimos la validación como campo requerido al password
		$password->addValidator(
			new PresenceOf(array(
				'message' => $this->di->get('translate')->_('El password es requerido')
			))
		);

		//label para el Password
		$password->setLabel($this->di->get('translate')->_('Password'));

		//hacemos que se pueda llamar a nuestro campo password
		$this->add($password);

		//prevención de ataques csrf, genera un campo de este tipo
		//<input value="dcf7192995748a80780b9cc99a530b58" name="csrf" id="csrf" type="hidden" />
		$randomsting = new Hidden('randomsting');

	
	}
}
