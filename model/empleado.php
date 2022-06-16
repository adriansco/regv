<?php
class Empleado
{
    private $pdo;

    public $idempleado;
    public $nombre;
    public $password;
    public $privilege;
    public $status;
    public $nomina;
    public $departamento;
    public $disponibles;
    public $usados;
    public $lastyear;
    public $current_year;
    public $area;
    public $ctrabajo;
    public $numims;
    public $curp;
    public $fecha_planta;

    /* public $servicio; */
    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEmpleados()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
                `idempleado`,
                `nombre`,
                `nomina`,
                `departamento`,
                `fecha_planta`,
                `disponibles`,
                `usados`,
                `lastyear`,
                `current_year`,
                `status`,
                `tipo`
            FROM
                `empleado`
            WHERE
                `status` = 'A'
                AND (
                `tipo` = 'Sindicalizado'
                OR `tipo` = 'Empleado')");
            $stm->execute(array());
            Database::disconnect();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEmpleadosSupervisor()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
                `idempleado`,
                `nombre`,
                `nomina`,
                `departamento`,
                `fecha_planta`,
                `disponibles`,
                `usados`,
                `lastyear`,
                `current_year`,
                `status`,
                `tipo` 
            FROM
                `empleado` 
            WHERE
                `status` = 'A' 
                AND `tipo` = 'Sindicalizado'");
            $stm->execute(array());
            Database::disconnect();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarSuper()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
                `idempleado`,
                `nombre`,
                `nomina`,
                `departamento`,
                `fecha_planta`,
                `disponibles`,
                `usados`,
                `lastyear`,
                `current_year`,
                `status`,
                `tipo` 
            FROM
                `empleado` 
            WHERE
                `status` = 'A' 
                AND (
                `privilege` = 'SUPER')");
            $stm->execute(array());
            Database::disconnect();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarManager()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
                `idempleado`,
                `nombre`,
                `nomina`,
                `departamento`,
                `fecha_planta`,
                `disponibles`,
                `usados`,
                `lastyear`,
                `current_year`,
                `status`,
                `tipo` 
            FROM
                `empleado` 
            WHERE
                `status` = 'A' 
                AND (
                    `privilege` = 'SUPER' 
                OR `privilege` = 'JEFE' 
                )");
            $stm->execute(array());
            Database::disconnect();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* Listar Admin */
    public function ListarAdmin()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT *
			FROM
			empleado;");
            $stm->execute(array());
            Database::disconnect();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* Listar usuarios/empresas */
    public function ListarUsers()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
				`iduser`, `name`
			FROM
				`user`");
            $stm->execute(array());
            Database::disconnect();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* Listar usuarios/empresas por id */
    public function ListarUsersId($id)
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
				`iduser`, `name`
			FROM
				`user` WHERE `iduser` = ?");
            $stm->execute(array($id));
            /* return $stm->fetchAll(PDO::FETCH_OBJ); */
            Database::disconnect();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* IMPORTANTE Obtiene el registro */
    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM empleado WHERE idempleado = ?");
            $stm->execute(array($id));
            Database::disconnect();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function searchUser($email)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM empleado WHERE nomina = '$email' LIMIT 1");
            $stm->bindParam(':alias', $email, PDO::PARAM_STR);
            $stm->execute();
            Database::disconnect();
            return $stm->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updatePass($email, $password)
    {
        try {
            $update_user = $this->pdo->prepare("UPDATE `empleado` SET `password` = :password WHERE	nomina = :email");
            $update_user->bindParam(':email', $email, PDO::PARAM_STR);
            $update_user->bindParam(':password', $password, PDO::PARAM_STR);
            $update_user->execute();
            Database::disconnect();
            return "Todo salio bien!";
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardarSolicitud($folio, $fecha_inicio, $fecha_fin, $regreso, $motivo, $comentarios, $count, $fk_empleado, $created_at)
    {
        /* empleado por default 0 */
        try {
            $sql = "INSERT INTO solicitud(folio,fecha_inicio,fecha_fin,fecha_rein,motivo,comentarios,status,cantidad,fk_empleado,created_at)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $folio,
                        $fecha_inicio,
                        $fecha_fin,
                        $regreso,
                        $motivo,
                        $comentarios,
                        '0',
                        $count,
                        $fk_empleado,
                        $created_at
                    )
                );
            Database::disconnect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function bajaEmpleado($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("UPDATE empleado
						SET `status` = 'B'
						WHERE
						idempleado = ?");
            $stm->execute(array($id));
            Database::disconnect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(empleado $data, $create_at)
    {
        try {
            $sql = "INSERT INTO empleado (nombre,departamento,puesto,created_at, updated_at)
		        VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->departamento,
                        $data->puesto,
                        $create_at,
                        '1000-01-01 00:00:00',
                    )
                );
            /* Último id que se inserto en tabla proveedor */
            $lastInsertId = $this->pdo->lastInsertId();
            Database::disconnect();
            return $lastInsertId;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function generarFolio()
    {
        try {
            $sql = "SELECT COUNT(*) total FROM solicitud";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array());
            /* Magic :B */
            $num_rows = $stm->fetchColumn();
            Database::disconnect();
            return $num_rows += 1;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
