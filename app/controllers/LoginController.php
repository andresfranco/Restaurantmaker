<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Query;
use Phalcon\Paginator\Adapter\Model as Paginator;
use LoginForm as FormLogin;

/**
 * @RoutePrefix("/login")
 */

class LoginController extends ControllerBase
{

  /**
  * @Route("/", methods={"POST","GET"}, name="loginindex")
 */
	public function indexAction()
	{
  $form = new FormLogin();
  $username = $this->request->getPost('username', array('striptags', 'trim'));
  $password = $this->request->getPost('password', array('striptags', 'trim'));

//si es una petición post
if ($this->request->isPost())
{

	 $token = $this->request->getPost("randomsting");

	 if (trim($token) ==trim($this->security->getSessionToken()))
	 {
		 //paso validacion CSRF

  //si el formulario no pasa la validación que le hemos impuesto
  if ($form->isValid($this->request->getPost()) == false)
  {
    //mostramos los mensajes con la clase error que hemos personalizado en los mensajes flash
    foreach ($form->getMessages() as $message)
    {
      $this->flash->error($message);
    }

  }
  else
  {

    //obtenemos al usuario por su email
    $user = User::findFirstByUsername($username);

    //si existe el usuario buscado por email
        if ($user)
        {
          //si el password que hay en la base de datos coincide con el que ha
          //ingresado encriptado, le damos luz verde, los datos son correctos
            if ($this->security->checkHash($password, $user->password))
            {
              //creamos la sesión del usuario con su email
              $this->session->set("userid", $user->id);
              $this->session->set("username", $user->username);
              return $this->response->redirect('index/home');
            }
            else
            {

              $this->flash->error("Usuario o contraseña inválida");
            }
        }
        else
        {

          $this->flash->error("Usuario o contraseña inválida");
        }
  }
}
else {
$this->flash->error("Se ha encontrado un problema en la autenticación");
}

}


$this->view->form = new FormLogin();
}
/**
* @Route("/logout", methods={"GET","POST"}, name="logout")
*/
public function LogoutAction()
    {
        $this->session->remove('userid');
			 $this->session->remove('username');

				return $this->response->redirect('login');
    }

		/**
	  * @Route("/test", methods={"GET","POST"}, name="test")
	 */
	public function testAction()
	{
		echo 'entro test';
	}

}
