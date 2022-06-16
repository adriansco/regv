<?php

class auth
{
    private $pdo;

    public $idempleado;
    public $nombre;
    public $password;
    public $status;
    public $nomina;
    public $departamento;
    public $dias_vacaciones;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* Valida que el usuario exista a nivel BD */
    public function Auth($email, $password)
    {
        try {
            $result = array();
            $stm = $this->pdo
                ->prepare("SELECT * FROM `empleado` WHERE `nomina` = ? AND `password` = ? LIMIT 1");
            $stm->execute(array($email, $password));
            Database::disconnect();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function SearchUser($email)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM empleado WHERE nomina = '$email' LIMIT 1");
            $stm->bindParam(':alias', $email, PDO::PARAM_STR);
            $stm->execute();
            Database::disconnect();
            return $stm->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function countSolicitudes($id)
    {
        try {
            $sql = "SELECT COUNT(*) FROM `solicitud` WHERE fk_empleado = ? ";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            /* Magic :B */
            $num_rows = $stm->fetchColumn();
            Database::disconnect();
            return $num_rows;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /* Obtiene el registro */
    public function Obtener($email)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM empleado WHERE nomina = ?");
            $stm->execute(array($email));
            Database::disconnect();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /* Inicializa la sesión */
    public function init()
    {
        session_name("regv");
        session_start();
        /* Cambiar el ID de sesión */
        session_regenerate_id(true);
        /* Establecemos que las paginas no pueden ser cacheadas */
        header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    /**
     * Agrega un elemento a la sesión
     * @param string $key la llave del array de sesión
     * @param string $value el valor para el elemento de la sesión
     */
    public function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Retorna un elemento a la sesión
     * @param string $key la llave del array de sesión
     * @return string el valor del array de sesión si tiene valor
     */
    public function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Retorna todos los valores del array de sesión
     * @return el array de sesión completo
     */
    public function getAll()
    {
        return $_SESSION;
    }

    /**
     * Remueve un elemento de la sesión
     * @param string $key la llave del array de sesión
     */
    public function remove($key)
    {
        if (!empty($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Cierra la sesión eliminando los valores
     */
    public function close()
    {
        /* $this->init();
        session_unset();
        session_destroy(); */
        session_unset();
        session_destroy();
        session_name("regv");
        session_start();
        session_regenerate_id(true);
    }

    /**
     * Retorna el estatus de la sesión
     * @return string el estatus de la sesión
     */
    public function getStatus()
    {
        return session_status();
    }
}
