<?php

require_once 'model/solicitud.php';
require_once 'model/auth.php';
date_default_timezone_set("America/Mexico_City");

class SolicitudController
{

    private $model;
    private $dateOne;
    private $session;
    const APROV_SOL = 1;      // RIGHT - Works INSIDE of a class definition.

    public function __CONSTRUCT()
    {
        $this->model = new solicitud();
        $this->dateOne = new DateTime();
        $this->session = new auth();
        $this->session = new auth();
        $this->session->init();
        if ($this->session->getStatus() === 0 || $this->session->getStatus() === 1 || empty($this->session->get('data'))) {
            header('Location: ?c=auth'); //Envío al usuario a la pág. de autenticación
        } else {
            //antes de hacer los cálculos, compruebo que el usuario está logueado
            if ($_SESSION['data']["Authenticated"] !== "SI") {
                //si no está logueado lo envío a la página de autentificación
                header('Location: ?c=auth');
            } else {
                //calculamos el tiempo transcurrido
                $ahora = date("Y-n-j H:i:s");
                $tiempo_transcurrido = (strtotime($ahora) - $_SESSION['data']["LastActivity"]);;
                //comparamos el tiempo transcurrido
                if ($tiempo_transcurrido >= 600) {
                    //si pasaron 10 minutos o más
                    $this->session->close(); // destruyo la sesión
                    header('Location: ?c=auth'); //Envío al usuario a la pág. de autenticación
                    //sino, actualizo la fecha de la sesión
                } else {
                    $_SESSION['data']["LastActivity"] = strtotime($ahora);
                }
            }
        }
    }

    public function Index()
    {
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/solicitud/solicitud.php';
        require_once 'view/footer.php';
    }

    public function genReport()
    {
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/solicitud/genReport.php';
        require_once 'view/footer.php';
    }

    public function viewChart()
    {
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/solicitud/chartArea.php';
        require_once 'view/footer.php';
    }

    /* Recibe el id que se envia por url con el botón */
    public function crud()
    {
        $solicitud = new solicitud();

        if (isset($_REQUEST['id'])) {
            $solicitud = $this->model->obtenerSolicitud($_REQUEST['id']);
        }
        /* Arma Vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/solicitud/solicitud-editar.php';
        require_once 'view/footer.php';
    }

    public function aprobarSolicitud()
    {
        /* $solicitud = new solicitud(); */
        if (isset($_REQUEST['id'])) {
            $solicitud = $this->model->obtenerUser($_REQUEST['id']);
        }
        /* if ($_REQUEST['cantidad'] < $solicitud->disponibles) { */
        $disponibles = $solicitud->disponibles - $_REQUEST['cantidad'];
        $usados = $solicitud->usados + $_REQUEST['cantidad'];

        $this->updateEmploye($_REQUEST['id'], $disponibles, $usados);
        $this->updateRequest(1, $_REQUEST['idsolicitud']);
        /* $message = 'Todo salió bien'; */
        /*} else {
        Temporal, falta regresar el error a la vista
        $message = 'Oh, oh, algo salió mal... Error inesperado.';
        }*/
        /* $_SESSION['message'] = $message; */
        header('Location: ?c=solicitud&a=pendingRequests');
    }

    public function approveMassRequests()
    {
        $solicitudes = $_REQUEST['ctrldel'];
        $message = 'Solicitudes aprobadas ';

        if (!isset($solicitudes)) {
            $_SESSION['error'] = 'Oops... No hay registros seleccionados';
            header('Location: ?c=solicitud&a=pendingRequests');
            /* Asegurándonos de que el código interior no será ejecutado cuando se realiza la redirección. */
            exit;/* die(); */
        }
        foreach ($solicitudes as $s) :
            $solicitud = $this->model->approveMassRequests($s);
            if (!$solicitud) {
                throw new Exception("Error Processing Request", 1);
            }
            if ($solicitud->status != 0) {
                throw new Exception("Error Processing Request", 1);
            }
            /* Si se puede mejorar, hazlo. */
            $id_empleado = $solicitud->fk_empleado;
            $ctrl_aprob = self::APROV_SOL;
            $empleado = $this->model->obtenerUser($id_empleado);
            $disponibles = $empleado->disponibles - $solicitud->cantidad;
            $usados = $empleado->usados + $solicitud->cantidad;
            $ctrlemp = $this->updateEmploye($id_empleado, $disponibles, $usados);
            if (!$ctrlemp) {
                throw new Exception("Error Processing Request", 1);
            }
            $ctrlreq = $this->updateRequest($ctrl_aprob, $solicitud->idsolicitud);
            if (!$ctrlreq) {
                throw new Exception("Error Processing Request", 1);
            }
            $message .= ', ' . $solicitud->folio;
        endforeach;
        $_SESSION['message'] = $message;
        header('Location: ?c=solicitud&a=pendingRequests');
        /* Asegurándonos de que el código interior no será ejecutado cuando se realiza la redirección. */
        exit;/* die(); */
    }

    public function eliminarSolicitud()
    {
        $solicitud = new solicitud();
        if (isset($_REQUEST['id'])) {
            if ($flag = $this->model->obtenerSolicitud($_REQUEST['id'])) {
                $this->model->eliminarSolicitud($_REQUEST['id']);
                $message = 'Todo salió bien!';
            } else {
                $message = 'Error inesperado!';
            }
        } else {
            $message = 'Error!';
        }
        /* $message = 'Oh, oh, algo salió mal... Error inesperado.'; */
        $_SESSION['message'] = $message;
        header('Location: ?c=solicitud');
    }

    public function cancelarSolicitud()
    {
        $solicitud = new solicitud();
        if (isset($_REQUEST['id'])) {
            if ($flag = $this->model->obtenerSolicitud($_REQUEST['id'])) {
                $this->model->cancelarSolicitud($_REQUEST['id']);
                $message = 'Todo salió bien!';
            } else {
                $message = 'Error inesperado!';
            }
        } else {
            $message = 'Error!';
        }
        /* $_SESSION['error'] */
        /* $message = 'Oh, oh, algo salió mal... Error inesperado.'; */
        $_SESSION['message'] = $message;
        header('Location: ?c=empleado');
    }

    public function anularSolicitud()
    {
        $solicitud = new solicitud();
        if (isset($_REQUEST['id'])) {
            $solicitud = $this->model->obtenerUser($_REQUEST['id']);
        }
        if ($_REQUEST['cantidad']) {
            $disponibles = $solicitud->disponibles + $_REQUEST['cantidad'];
            $usados = $solicitud->usados - $_REQUEST['cantidad'];
            $this->updateEmploye($_REQUEST['id'], $disponibles, $usados);
            $this->updateRequest(0, $_REQUEST['idsolicitud']);
            $message = 'Todo salió bien';
        } else {
            /* Temporal, falta regresar el error a la vista */
            $message = 'Oh, oh, algo salió mal... Error inesperado.';
        }
        $_SESSION['message'] = $message;
        header('Location: ?c=solicitud');
    }

    public function updateEmploye($id, $disponibles, $usados)
    {
        $ctrlemp = $this->model->updateEmploye($id, $disponibles, $usados);
        return ($ctrlemp ? true : false);
    }

    public function updateRequest($control, $id)
    {
        $ctrlreq = $this->model->updateRequest($control, $id);
        return ($ctrlreq ? true : false);
    }

    public function pendingRequests()
    {
        /* Arma Vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/solicitud/pendingRequests.php';
        require_once 'view/footer.php';
    }

    /* Muestra los servicios por solicitud */
    public function Record()
    {
        $solicitud = new solicitud();
        if (isset($_REQUEST['id'])) {
            /* Obtenemos las solicitudes y los servicios */
            $solicitud = $this->model->obtenerSolicitud($_REQUEST['id']);
            /* $cosa = $this->model->Servicios($_REQUEST['id']); */
        }
        /* Arma la vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/solicitud/solicitud-record.php';
        require_once 'view/footer.php';
    }

    /* Eliminar solicitud */
    /* public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    } */

    /* Eliminar Servicio del solicitud */
    public function EliminarRecord()
    {
        /* Obtiene el id del registro en BD */
        $servicio = $this->servicio->obtenerServicio($_REQUEST['id']);
        $borrar = $servicio->Ruta;
        /* Borrar el archivo del directrio */
        unlink($borrar);
        /* Borra registro de BD */
        $this->servicio->EliminarRecord($_REQUEST['id']);
        header('Location: index.php?c=solicitud&a=Record&id=' . $_REQUEST['idsolicitud']);
    }
    /* Email de registro */
    public function enviarMail($solicitud)
    {
        $to = "easuarez@vizcarra.com, easuarez@vizcarra.com";
        $subject = "Nuevo solicitud en Sistema Registro solicitudes - SIVI 0.1";
        $message = "Nuevo usuario registrado:\n correo: " . $solicitud->correo . "\n Nombre: " . $solicitud->nombre . " " . $solicitud->apellidos . "\n Teléfono: " . '+52' . $solicitud->telefono . "\n Registrado por: " . $_SESSION['data']['Name'];
        mail($to, $subject, $message);
    }
}
