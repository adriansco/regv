<?php
class Festivo
{
    private $pdo;

    public $id;
    public $name;

    /* public $servicio; */
    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function controlExtraDay($id, $day)
    {
        try {
            $stm = $this->pdo->prepare("SELECT id_empleado, id_festivo, `status`, fecha, created_at FROM `control_festivos` 
                WHERE id_empleado = ? AND id_festivo = ?");
            $stm->execute(array($id, $day));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT COUNT(*) as ctrl FROM control_festivos WHERE id_empleado = ? AND `status` = 1");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $stm = $this->pdo->prepare("SELECT id,`name` FROM festivos");
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function storeFestivo($id_empleado, $id_festivo, $fecha, $observaciones)
    {
        /* empleado por default 0 */
        try {
            $sql = "INSERT INTO control_festivos(id_empleado,id_festivo,status,fecha,comments)
		        VALUES (?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $id_empleado,
                        $id_festivo,
                        1,
                        $fecha,
                        $observaciones,
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function approveExtraDay($id, $fecha, $comment)
    {
        try {
            $update_day = $this->pdo->prepare("UPDATE `control_festivos` SET fecha = :fecha, `status` = 0, comments = :comments WHERE id = :id");
            $update_day->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $update_day->bindParam(':comments', $comment, PDO::PARAM_STR);
            $update_day->bindParam(':id', $id, PDO::PARAM_STR);
            $update_day->execute();
            return "Todo salio bien!";
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function diasPorEmpleado($id)
    {
        try {
            $sql = "SELECT
                control_festivos.id,
                empleado.idempleado,
                festivos.`name`,
                control_festivos.id_festivo,
                empleado.nombre 
            FROM
                `control_festivos`
                JOIN empleado ON control_festivos.id_empleado = empleado.idempleado
                JOIN festivos ON control_festivos.id_festivo = festivos.id 
            WHERE
                id_empleado = :id AND control_festivos.`status` = 1";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(':id' => $id));
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
