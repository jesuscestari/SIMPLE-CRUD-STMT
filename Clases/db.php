<?php


class db
{
    protected $conn;

    public function __construct($dbhost, $dbuser, $dbpass, $dbname, $charset = 'utf8') {
        $this->conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($this->conn->connect_error) {
            $this->error('No se pudo conectar a la base de datos - ' . $this->conn->connect_error);
        }
        $this->conn->set_charset($charset);
    }

    //me devuele la conexion
    public function getConn()
    {
        return $this->conn;
    }

        //la cierro
    public function closeCon() {
        return $this->conn->close();
    }




}