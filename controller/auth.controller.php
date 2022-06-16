<?php

require_once 'model/auth.php';
/* require_once 'model/auth.php'; */

class AuthController
{
    private $model;
    private $session;
    public function __CONSTRUCT()
    {
        $this->model = new auth();
        $this->session = new auth();
    }

    public function Index()
    {
        require_once 'view/auth/auth.php';
    }
    /* Recibe el id que se envia por url con el botón */
    public function Validation()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $array_devolver = [];
            $email = strtolower($_POST['email']);
            $password = $_POST['password'];

            // comprobar si el user existe
            $count = $this->model->SearchUser($email);
            if ($count == 1) {
                // Existe
                $user = $this->model->Obtener($email);
                $user_id = (int) $user['idempleado'];
                $hash = (string) $user['password'];
                //Solicitudes
                /* $requests = $this->model->countSolicitudes($user_id); */
                /* Verificar contraseña */
                if (password_verify($password, $hash)) {
                    /* Guardamos los datos del usuario (Spanglish :B)*/
                    $aut_huser = array(
                        'ID' => $user['idempleado'],
                        'Name' => $user['nombre'],
                        'Area' => $user['area'],
                        'Nomina' => $user['nomina'],
                        'Privilege' => $user['privilege'],
                        'userAgent' => $_SERVER['HTTP_USER_AGENT'],
                        'SKey' => uniqid(mt_rand(), true),
                        'IPaddress' => $this->getIPAddress(),
                        'LastActivity' => $_SERVER['REQUEST_TIME'],
                        /* 'LastActivity' => date("Y-n-j H:i:s"), */
                        'Authenticated' => 'SI',
                        'message' => '',
                        'error' => '',
                    );
                    /* Iniciamos Sesión */
                    $this->model->init();
                    /* Agregamos el usuario a la sesión */
                    $this->model->add('data', $aut_huser);
                    /* Redireccionamos si todo esta bien */
                    if ($_SESSION['data']['Privilege'] == 'ENCARGADO') {
                        $array_devolver['redirect'] = '?c=empleado';
                    } else {
                        $array_devolver['redirect'] = '?c=empleado';
                    }
                } else {
                    $array_devolver['error'] = "Los datos no son validos.";
                }
            } else {
                $array_devolver['error'] = "No tienes cuenta.";
            }

            echo json_encode($array_devolver);
        } else {
            exit("Fuera de aquí");
        }
    }

    public function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function Kill()
    {
        $this->model->close();
        header('Location: index.php');
    }
}
