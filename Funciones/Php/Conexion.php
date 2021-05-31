<?php
class Conexion
{
    //creacion de variables privada
    private $Host = 'localhost';
    private $User = 'root';
    private $Password = '';
    private $Database = 'electivaphp';
    private $atributos = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

    //protecion de conexion
    protected $db;

    public function conectar()
    {
        try {
            
            //Conexion PDO
            $this->db = new PDO("mysql:host={$this->Host};dbname={$this->Database};charset=utf8", $this->User, $this->Password,$this->atributos);
            
            //Devuelve el valor
            return $this->db;

        } catch (PDOException $e) {

            echo 'Fallo Al Conectarse Con El Servidor.' . $e->getMessage();
        }
    }
}

