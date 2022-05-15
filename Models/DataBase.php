<?php
require_once('configDB.php');
class DataBase
{

    protected static $instance;
    // Una propiedad estática para contener la única instancia de la clase


    // El constructor es privado, por lo que el código externo no puede crear una instancia.
    private function __construct()
    {
    }

    // Todo el código que necesita obtener una instancia de la clase debe llamar
    // esta función así: $db = Database::getInstance();
    public static function getInstance()
    {
        if (!isset(self::$instance)) //self:es para atributos o metodos estaticos//
        {
            try {
                //parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena);
                $data_server = DB . ':host=' . HOST . ';dbname=' . DB_NAME;
                self::$instance = new PDO($data_server, USER, PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->exec("SET CHARACTER SET utf8");
                //manejo de errores//
            } catch (PDOException $e) {
                self::$instance = null;
                throw new Exception('Error al conectarse al servidor de BD', 0);
                //instruccion de manejo de errores//
            }
        }
        return self::$instance; //retorna el objeto PDO//
    }

    // Block the clone method
    private function __clone()
    {
    }
}
