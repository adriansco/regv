<?php

require_once 'model/empleado.php';
require_once 'model/auth.php';
require_once 'model/solicitud.php';
require_once 'model/festivo.php';
date_default_timezone_set("America/Mexico_City");

class EmpleadoController
{
    private $model;
    private $dateOne;
    private $session;
    private $festivo;

    public function __CONSTRUCT()
    {
        $this->model = new empleado();
        $this->solicitud = new solicitud();
        $this->festivo = new festivo();
        $this->dateOne = new DateTime();
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
        require_once 'view/empleado/empleado.php';
        /* require_once 'documento_extra.php */
        /* Con esto se planea quitar carga de recursos innecesarios dependiendo de la vista a cargar */
        require_once 'view/footer.php';/* Esto debe ser el final o en su defecto sustituir */
    }
    /* Recibe el id que se envia por url con el botón */
    public function crud()
    {
        $empleado = new empleado();

        if (isset($_REQUEST['id'])) {
            $empleado = $this->model->obtener($_REQUEST['id']);
        }
        /* Arma Vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-request.php';
        require_once 'view/footer.php';
    }
    /* Días Extra */
    public function extraDays()
    {
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-extra-days.php';
        require_once 'view/footer.php';
    }
    public function extraDaysById()
    {
        /* $empleado = new empleado(); */
        if (isset($_REQUEST['id'])) {
            $empleado = $this->model->obtener($_REQUEST['id']);
        }
        /* var_dump($empleado); */
        /* Arma Vista */
        /* require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-request.php';
        require_once 'view/footer.php'; */
    }
    public function editEmpleado()
    {
        $empleado = new empleado();

        if (isset($_REQUEST['id'])) {
            $empleado = $this->model->obtener($_REQUEST['id']);
        }
        /* Arma Vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-editar.php';
        require_once 'view/footer.php';
    }
    /* podría haber sido un solo crud, pero mejor dos jaja */
    public function crudEmpleado()
    {
        $empleado = new empleado();

        if (isset($_REQUEST['id'])) {
            $empleado = $this->model->obtener($_REQUEST['id']);
        }
        /* Arma Vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-crud.php';
        require_once 'view/footer.php';
    }

    /* Muestra los servicios por empleado */
    public function Record()
    {
        $empleado = new empleado();
        if (isset($_REQUEST['id'])) {
            /* Obtenemos los empleados */
            $empleado = $this->model->obtener($_REQUEST['id']);
        }
        /* Arma la vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-record.php';
        require_once 'view/footer.php';
    }

    public function guardarSolicitud()
    {
        /* echo '<pre>'; */
        $val = $this->model->generarFolio();
        $folio = 'SD' . $val;
        $motivo = 'Día a cuenta de vacaciones.';
        $observaciones = $_POST['observaciones'];
        $fecha_inicio = date("Y-m-d", strtotime($_POST["entrada"])); /* modificar */
        $fecha_fin = date("Y-m-d", strtotime($_POST["salida"])); /* modificar */
        $regreso = date("Y-m-d", strtotime($_POST["regreso"])); /* modificar */
        $count = $_POST['countd'];
        $id = $_POST['id'];
        /* $motivo = $_POST['i-radio']; */
        /* $explode = explode(',', $fechas); */
        /* $count = count($explode); */

        /* Si el id es mayor actualiza si no crea */
        /* $cliente->id > 0
            ? $this->model->Actualizar($cliente)
            : $this->model->Registrar($cliente,$api,$list, $id, $create_at); */
        $created_at = $this->dateOne->format('Y-m-d H:i:s');
        $this->model->guardarSolicitud($folio, $fecha_inicio, $fecha_fin, $regreso, $motivo, $observaciones, $count, $id, $created_at);
        if (
            $_SESSION['data']['Privilege'] == 'USER' || $_SESSION['data']['Privilege'] == 'SUPER' || $_SESSION['data']['Privilege'] == 'JEFE'
            || $_SESSION['data']['Privilege'] == 'GERENTE'
        ) {
            header('Location: index.php?c=empleado&a=test&id=' . $id . '&folio=' . $folio);
        } elseif ($_SESSION['data']['Privilege'] == 'ADMIN') {
            $_SESSION['message'] = "Solicitud guardada con el folio: " . $folio;
            header('Location: ?c=empleado');
        }
    }

    public function test()
    {
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/generarpdf.php';
        require_once 'view/footer.php';
    }

    public function changePassword()
    {
        $empleado = new empleado();
        if (isset($_REQUEST['id'])) {
            $empleado = $this->model->obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-password.php';
        require_once 'view/footer.php';
    }

    public function valData()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Content-Type: application/json");
            $array_devolver = [];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // comprobar si el user existe
            $count = $this->model->searchUser($email);
            if ($count == 1) {
                /* $array_devolver['error'] = "El usuario existe"; */
                // Existe
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $response = $this->model->updatePass($email, $password);
                $array_devolver['error'] = $response;
                /* $array_devolver['is_login']= false; */
            } else {
                $array_devolver['error'] = "No tienes cuenta."; /* <a href='registro.php'>Nuevo cuenta</a> */
            }

            echo json_encode($array_devolver);
        } else {
            exit("Fuera de aquí");
        }
    }

    /* Eliminar empleado */
    public function bajaEmpleado()
    {
        $this->model->bajaEmpleado($_REQUEST['id']);
        header('Location: index.php');
    }

    /* Eliminar Servicio del empleado */
    public function EliminarRecord()
    {
        /* Obtiene el id del registro en BD */
        $servicio = $this->servicio->obtenerServicio($_REQUEST['id']);
        $borrar = $servicio->Ruta;
        /* Borrar el archivo del directrio */
        unlink($borrar);
        /* Borra registro de BD */
        $this->servicio->EliminarRecord($_REQUEST['id']);
        header('Location: index.php?c=empleado&a=Record&id=' . $_REQUEST['idempleado']);
    }
    /* Email de registro */
    public function enviarMail($empleado)
    {
        $to = "easuarez@vizcarra.com, easuarez@vizcarra.com";
        $subject = "Nuevo empleado en Sistema Registro empleadoes - SIVI 0.1";
        $message = "Nuevo usuario registrado:\n correo: " . $empleado->correo . "\n Nombre: " . $empleado->nombre . " " . $empleado->apellidos . "\n Teléfono: " . '+52' . $empleado->telefono . "\n Registrado por: " . $_SESSION['data']['Name'];
        mail($to, $subject, $message);
    }

    public function generarReportePremium()
    {
        /* Validación de la peticón */
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        }
        /* VARIABLES */
        $create_at = $this->dateOne->format('Y-m-d H:i:s');
        // NOMBRE DEL ARCHIVO Y CHARSET
        header('Content-Type:text/csv; charset="utf-8"');
        header('Content-Disposition: attachment; filename="Reporte_Clientes' . '_' . $create_at . '.csv"');
        // SALIDA DEL ARCHIVO
        $salida = fopen('php://output', 'w');
        // ENCABEZADOS
        fputcsv($salida, array('Nombre', 'Apellidos', 'Fecha de Nacimiento', 'Correo', 'Telefono'));
        // QUERY PARA CREAR EL REPORTE
        foreach ($this->model->listarEmpleados($id) as $r) :
            $newDate = date("Y/m/d", strtotime($r->fnac));
            fputcsv($salida, array($r->nombre, $r->apellidos, $newDate, $r->correo, $r->telefono));
        endforeach;
    }

    public function listarSupervisor()
    {
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-supervisor.php';
        require_once 'view/footer.php';
    }

    public function antiguedadEmpleado($fecha)
    {
        if ($fecha != '1000-01-01') {
            $objDateTime = new DateTime('NOW');
            $now = $objDateTime->format('Y');
            $firstDate = new DateTime($fecha); /* fecha de planta */
            $controlDate = $firstDate->format('Y');
            $pos = strpos($controlDate, '-');
            if ($pos === false) {
                return $now - $controlDate;
            } else {
                return '0';
            }
        } else {
            return '0';
        }
    }

    public function validarFechaPlanta($fecha)
    {
        if ($fecha != '1000-01-01') {
            $firstDate = new DateTime($fecha); /* fecha de planta */
            $controlDate = $firstDate->format('Y');
            $pos = strpos($controlDate, '-');
            /*  */
            if ($pos === false) {
                return date("Y/m/d", strtotime($fecha));
            } else {
                return 'N/A';
            }
        } else {
            return 'Eventual';
        }
    }

    public function validarExtraDay($id, $day)
    {
        $flag = $this->festivo->controlExtraDay($id, $day);

        if (!empty($flag)) {
            // Año actual con 4 dígitos, ej 2013
            $anio = date("Y", strtotime($flag->fecha));
            $anioa = date("Y");
            if ($anio === $anioa || $anio === '1000') {
                /* 0 | 1 */
                if ($flag->status === '0') {
                    return '<span class="tooltip-us fa fa-times-circle times"><span class="tooltiptext">Disfrutado el día: ' . $flag->fecha . '</span></span>';
                } else {
                    return '<span class="tooltip-us fa fa-check-circle check"><span class="tooltiptext">Pendiente por disfrutar</span></span>';
                }
            } elseif ($flag->id_festivo === '10') {
                return '<span class="tooltip-us fa fa-times-circle times"><span class="tooltiptext">Disfrutado el día: ' . $flag->fecha . '</span></span>';
            } else {
                return 'fatal error';
            }
        } else {
            return '<span class="tooltip-us fa fa-exclamation-circle warning-ico"><span class="tooltiptext">N/A</span></span>';
        }
    }

    public function findById($id)
    {
        $flag = $this->festivo->findById($id);
        if ($flag->ctrl > 0) {
            /* 1 */
            return true;
        } else {
            /*  */
            return false;
        }
    }

    /* Registrar Servicios por empleado */
    public function addExtraDay()
    {
        if (isset($_REQUEST['id'])) {
            $empleado = $this->model->obtener($_REQUEST['id']);
            $festivos = $this->festivo->listar();
        }
        /* Arma Vista */
        require_once 'view/header.php';
        require_once 'view/aside.php';
        require_once 'view/empleado/empleado-add-extra.php';
        require_once 'view/footer.php';
    }

    public function storeExtraDay()
    {
        /* echo '<pre>'; */
        $observaciones = $_POST['observaciones'];
        $fecha = date("Y-m-d");
        $id_festivo = $_POST['festivo'];
        $id_empleado = $_POST['id'];
        $flag = $this->festivo->controlExtraDay($id_empleado, $id_festivo);
        /* El año debe ser diferente, porque no se pueden guardar dos solicitudes del mismo día en el mismo año */
        /* $anio = date("Y", strtotime($flag->fecha));
        $anioa = date("Y"); */
        if (!empty($flag)) {
            // Algo inecesario XD
            if (count(array($flag)) >= 1) {
                /* $_SESSION['error'] = "Solo puede tener este día festivo una vez al año"; */
                $_SESSION['message'] = "Solo puede tener este día festivo una vez al año";
            }
        } else {
            $this->festivo->storeFestivo($id_empleado, $id_festivo, $fecha, $observaciones);
            $_SESSION['message'] = "¡Registro guardado con éxito!";
        }
        header('Location: ?c=empleado&a=extraDays');
    }

    public function diasPorEmpleado()
    {
        header('Content-Type: application/json');
        $dias = $this->festivo->diasPorEmpleado($_POST['id']);
        print_r(json_encode($dias));
    }

    public function approveExtraDay()
    {
        /* echo '<pre>'; */
        header('Content-Type: application/json');
        $id = $_POST['slt-dias'];;
        $fecha = date("Y-m-d", strtotime($_POST["entrada"]));
        $comment = $_POST['observaciones'];
        $res = $this->festivo->approveExtraDay($id, $fecha, $comment);
        print_r(json_encode($res));
    }
}
