
<?php

abstract class DBAAbstractModel
{
    private static $db_host;
    private static $db_user;
    private static $db_pass;
    private static $db_port;
    protected $db_name ;
    protected $query;
    protected $rows;
    protected $conn;

    public function __construct()
    {
        self::$db_host  = 'localhost';
        self::$db_user = 'root';
        self::$db_pass = '';
        self::$db_port ='3306';
        $this->db_name = 'prueba';
        $this->query = '';
        $this->rows = array();
        $this->conn ='';
    }

    /*//Declarando metodos abstractos para los Modelos genéricos de las clases que hereden.
    abstract public function crear();
    abstract public function editar();
    abstract public function eliminar();
    abstract public function consultar();
    abstract public function consultarTodos();*/

    # Conectar a la base de datos
    private function abreConexion()
    {
        try {
            $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name, self::$db_port);
            $this->conn->set_charset("SET NAMES 'utf8';");
            if ($this->conn->connect_errno) {
                echo "Error: Fallo al conectarse a MySQL debido a: \n";
                echo "Errno: " . $mysqli->connect_errno . "\n";
                echo "Error: " . $mysqli->connect_error . "\n";
                exit();
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    # Desconectar conexion de la base de datos
    private function cierraConexion()
    {
        if ($this->conn !=null) {
            $this->conn->close();
        }
    }


    protected function ejecutaConsulta()
    {
        $this->abreConexion(); // abre la conexión
        $this->conn->query($this->query); // Ejecuta la consulta
        $this->cierraConexion(); // cierra la conexión
    }



    public function obtenerResultadoConsulta()
    {
        $this->abreConexion();
        $stmt = $this->conn->prepare($this->query);
        $stmt->execute();
        $rs = $stmt->get_result();
        $this->cierraConexion();
        return $rs;
    }


    public function getConexion()
    {
        $this->abreConexion();
        return $this->conn;
    }
}

?>
