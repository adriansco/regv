<?php
class Solicitud
{
    private $pdo;

    public $idsolicitud;
    public $folio;
    public $dia;
    public $motivo;
    public $comentarios;
    public $status;
    public $fk_empleado;
    public $fk_autorizo;
    public $created_at;
    public $authorized_at;

    /* public $servicio; */
    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function detalleSolicitud()
    {
        try {
            $stm = $this->pdo->prepare("SELECT
                s.fk_empleado AS idempleado,
                s.cantidad AS cantidad,
                e.nombre AS nombre,
                e.nomina AS nomina,
                e.area AS area,
                e.ctrabajo AS planta,
                e.departamento AS departamento,
                s.fecha_inicio AS inicio,
                s.fecha_fin AS fin,
                s.folio AS folio,
                s.fecha_rein AS regreso,
                s.comentarios AS comentarios,
                s.`status` AS `status`,
                s.motivo,
                s.idsolicitud AS idsolicitud,
                e.disponibles AS disponibles,
                e.usados AS tomados 
            FROM
                solicitud s
                INNER JOIN empleado e ON s.fk_empleado = e.idempleado 
            WHERE
                s.`status` = '1' 
                OR s.`status` = '2' 
                OR s.`status` = '0'");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function genReport()
    {
        try {
            $stm = $this->pdo->prepare("SELECT
            solicitud.fk_empleado AS id,
            empleado.nombre,
            IF(empleado.fecha_planta = '0000-00-00', '0', YEAR (CURDATE())- YEAR ( empleado.fecha_planta )) AS 'ant',
            empleado.nomina,
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 1 THEN solicitud.cantidad ELSE 0 END ) AS Ene,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 1 THEN solicitud.folio END SEPARATOR ' ; ') AS 'renero',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 2 THEN solicitud.cantidad ELSE 0 END ) AS Feb,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 2 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rfeb',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 3 THEN solicitud.cantidad ELSE 0 END ) AS Mar,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 3 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rmar',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 4 THEN solicitud.cantidad ELSE 0 END ) AS Abr,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 4 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rabr',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 5 THEN solicitud.cantidad ELSE 0 END ) AS May,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 5 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rmay',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 6 THEN solicitud.cantidad ELSE 0 END ) AS Jun,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 6 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rjun',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 7 THEN solicitud.cantidad ELSE 0 END ) AS Jul,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 7 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rjul',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 8 THEN solicitud.cantidad ELSE 0 END ) AS Ago,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 8 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rago',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 9 THEN solicitud.cantidad ELSE 0 END ) AS Sep,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 9 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rsep',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 10 THEN solicitud.cantidad ELSE 0 END ) AS Oct,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 10 THEN solicitud.folio END SEPARATOR ' ; ') AS 'roct',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 11 THEN solicitud.cantidad ELSE 0 END ) AS Nov,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 11 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rnov',
            SUM( CASE WHEN MONTH ( solicitud.fecha_inicio ) = 12 THEN solicitud.cantidad ELSE 0 END ) AS Dic,
            GROUP_CONCAT(CASE WHEN MONTH ( solicitud.fecha_inicio ) = 12 THEN solicitud.folio END SEPARATOR ' ; ') AS 'rdic',
            SUM( solicitud.cantidad ) AS total
        FROM
            solicitud
            JOIN empleado ON empleado.idempleado = solicitud.fk_empleado 
        WHERE
            ( solicitud.fecha_inicio BETWEEN '2021-01-01' AND '2021-12-31' ) 
            AND solicitud.`status` = '1' 
        GROUP BY
            solicitud.fk_empleado");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function pendingRequests()
    {
        try {
            $stm = $this->pdo->prepare("SELECT
                s.fk_empleado AS idempleado,
                s.cantidad AS cantidad,
                e.nombre AS nombre,
                e.nomina AS nomina,
                e.area AS area,
                e.ctrabajo AS planta,
                e.departamento AS departamento,
                s.fecha_inicio AS inicio,
                s.fecha_fin AS fin,
                s.folio AS folio,
                s.fecha_rein AS regreso,
                s.comentarios AS comentarios,
                s.`status` AS `status`,
                s.motivo,
                s.idsolicitud AS idsolicitud,
                e.disponibles AS disponibles,
                e.usados AS tomados 
            FROM
                solicitud s
                INNER JOIN empleado e ON s.fk_empleado = e.idempleado 
            WHERE
                s.`status` = '0'");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function detalleSolicitudId($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT
                s.fk_empleado AS idempleado,
                s.cantidad AS cantidad,
                e.nombre AS nombre,
                e.nomina AS nomina,
                e.area AS area,
                e.ctrabajo AS planta,
                e.departamento AS departamento,
                s.fecha_inicio AS inicio,
                s.fecha_fin AS fin,
                s.folio AS folio,
                s.fecha_rein AS regreso,
                s.comentarios AS comentarios,
                s.`status` AS `status`,
                s.motivo,
                s.idsolicitud AS idsolicitud,
                e.disponibles AS disponibles,
                e.usados AS tomados 
            FROM
                solicitud s
                INNER JOIN empleado e ON s.fk_empleado = e.idempleado 
            WHERE
                e.idempleado = ? 
                AND (
                    s.`status` = '1' 
                OR s.`status` = '2' 
                OR s.`status` = '0')");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function detallesEmpleadoId($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT
                e.nombre AS nombre,
                e.disponibles AS disponibles,
                e.usados AS tomados,
                e.usados,
                e.lastyear,
                e.current_year
            FROM
                empleado e
            WHERE
                e.idempleado = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function generarPdf($id, $folio)
    {
        try {
            $stm = $this->pdo->prepare("SELECT
                s.fk_empleado AS idempleado,
                s.cantidad AS cantidad,
                e.nombre AS nombre,
                e.nomina AS nomina,
                e.area AS area,
                e.ctrabajo AS planta,
                e.departamento AS departamento,
                s.fecha_inicio AS inicio,
                s.fecha_fin AS fin,
                s.folio AS folio,
                s.fecha_rein AS regreso,
                s.comentarios AS comentarios,
                s.`status` AS `status`,
                s.motivo,
                s.idsolicitud AS idsolicitud,
                e.disponibles AS disponibles,
                e.usados AS tomados 
            FROM
                solicitud s
                INNER JOIN empleado e ON s.fk_empleado = e.idempleado 
            WHERE
                e.idempleado = ? AND s.folio = ?");
            $stm->execute(array($id, $folio));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarSolicitudes()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
            idsolicitud,
            e.nombre AS nombre,
            nomina,
            s.`status` AS estado,
            departamento,
            motivo,
            comentarios,
            dia,
            folio
        FROM
            `solicitud` s
            INNER JOIN empleado e ON s.fk_empleado = e.idempleado");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* Listar equipos activos*/
    public function listarEquiposAsignados($control)
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
				`idproducto`,
				`valor_factura`,
				`serie`,
				`modelo`,
				c.`nombre` AS 'categoria',
				e.ip
			FROM
				`producto` p
				INNER JOIN `categoria` c ON p.categorie_id = c.idcategoria
				INNER JOIN `computo` e ON p.idproducto = e.fk_producto
			WHERE
				p.categorie_id = $control
				AND p.`status` = 'A'");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEquiposLibres($control)
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
				`idproducto`,
				`valor_factura`,
				`serie`,
				`modelo`,
				c.`nombre` AS 'categoria',
				e.ip
			FROM
				`producto` p
				INNER JOIN `categoria` c ON p.categorie_id = c.idcategoria
				INNER JOIN `computo` e ON p.idproducto = e.fk_producto
			WHERE
				p.categorie_id = $control
				AND p.`status` = 'L'");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /* Listar equipos bajas*/
    public function listarEquiposBaja($control)
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT
				`idproducto`,
				`valor_factura`,
				`serie`,
				`modelo`,
				c.`nombre` AS 'categoria',
				e.ip
			FROM
				`producto` p
				INNER JOIN `categoria` c ON p.categorie_id = c.idcategoria
				INNER JOIN `computo` e ON p.idproducto = e.fk_producto
			WHERE
				p.categorie_id = $control AND p.`status` = 'B' ");
            $stm->execute(array());
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
			equipo;");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* IMPORTANTE Obtiene el registro */
    public function obtenerEquipo($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM producto WHERE idproducto = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function detalleAsignacion($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT
				`idasignacion`,
				`product_id`,
				`cantidad`,
				`fecha_asignacion`,
				e.`nombre` AS 'Nombre'
			FROM
				`asignacion` a
				INNER JOIN `empleado` e ON a.fk_empleado = e.idempleado
			WHERE
				a.product_id = ? AND a.`status` = 1");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarSolicitud($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("UPDATE solicitud
                    SET `status` = '3'
                    WHERE idsolicitud = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cancelarSolicitud($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("UPDATE solicitud
                    SET `status` = '2'
                    WHERE idsolicitud = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerUser($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT `nombre`,`disponibles`,`usados` FROM `empleado` WHERE `idempleado` = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerSolicitud($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT idsolicitud FROM `solicitud` WHERE idsolicitud = ?");
            $stm->execute(array($id));
            /* return $stm->fetch(PDO::FETCH_OBJ); */
            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (!$rows) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /* aprobación masiva */
    public function approveMassRequests($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT idsolicitud, fk_empleado, cantidad, `status`, folio FROM `solicitud` WHERE idsolicitud = ?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
            /* $rows = $stm->fetchAll(PDO::FETCH_ASSOC); */
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateEmploye($id, $disponibles, $usados)
    {
        $this->pdo->beginTransaction();
        try {
            $stm = $this->pdo->prepare("UPDATE empleado SET disponibles = ?, usados = ? WHERE idempleado = ?");
            $stm->execute(array(
                $disponibles,
                $usados,
                $id,
            ));
            $this->pdo->commit();
            return TRUE;
        } catch (Exception $e) {
            $this->pdo->rollback();
            die($e->getMessage());
        }
    }

    public function updateRequest($control, $id)
    {
        $this->pdo->beginTransaction();
        try {
            $stm = $this->pdo->prepare("UPDATE solicitud SET `status` = ? WHERE idsolicitud = ?");
            $stm->execute(array(
                $control,
                $id
            ));
            $this->pdo->commit();
            return TRUE;
        } catch (Exception $e) {
            $this->pdo->rollback();
            die($e->getMessage());
        }
    }
}
